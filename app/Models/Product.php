<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use DB;
class Product extends Model
{
    static function Offerings(){
        $sNow = date('Y-m-d H:i:s');
        return Product::where('discountStart_at', '<=', $sNow)
        ->where('discountEnd_at', '>=', $sNow)
        ->where('discountPercent', '>', 0)->get();
    }
    
    static function NewProducts(){
        $sNow = date('Y-m-d H:i:s');
        $sNextWeek = date('Y-m-d H:i:s', strtotime($sNow . ' - 1 week'));
        return Product::where(DB::raw('date_format(updated_at,
        "%Y-%m-%d")'), '<=', date('Y-m-d', strtotime($sNow)))
        ->where('updated_at', '>=', date('Y-m-d', strtotime($sNextWeek)))
        ->get();

    }

    public function HasDiscount(){
        $sNow = date('Y-m-d H:i:s');
        if($this->discountPercent == 0){
            return false;
        }else{
            if($sNow > $this->discountEnd_at){
                return false;
            }else{
                if($sNow < $this->discountStart_at){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }

    public function Company(): BelongsTo{
        return $this->belongsTo(Company::class);
    }
    use HasFactory;
}
