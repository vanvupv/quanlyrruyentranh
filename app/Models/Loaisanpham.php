<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    use HasFactory;

    // Khai bao cac thuoc tinh
    protected $table = 'loaisanpham';

    protected $primaryKey = 'id';

    protected $fillable = [
        'parent_id',
        'tenloai',
        'mota',
        'anhbia',
    ];

    protected static $getListTitleAdmin = null;
    protected static $getListCategoryGroupByParentAdmin = null;

    /*
     *
     *
     * */
    public function parentCategory()
    {
        return $this->belongsTo(Loaisanpham::class, 'parent_id', 'id');
    }

    public function childCategories()
    {
        return $this->hasMany(Loaisanpham::class, 'parent_id', 'id');
    }

    /**
     * Get tree categories
     *
     * @param   [type]  $parent      [$parent description]
     * @param   [type]  &$tree       [&$tree description]
     * @param   [type]  $categories  [$categories description]
     * @param   [type]  &$st         [&$st description]
     *
     * @return  [type]               [return description]
     */
    public function getTreeCategoriesAdmin($parent = 0, &$tree = [], $categories = null, &$st = '')
    {
        $categories = $categories ?? $this->getListCategoryGroupByParentAdmin();	// Lấy danh sách danh mục - nếu không có tham số thì danh mục là đối tượng gọi đến hàm này.
        $categoriesTitle =  $this->getListTitleAdmin();
        $tree = $tree ?? [];
        $lisCategory = $categories[$parent] ?? [];
        if ($lisCategory) {
            foreach ($lisCategory as $category) {
                $tree[$category['id']] = $st . $categoriesTitle[$category['id']];
                if (!empty($categories[$category['id']])) {
                    $st .= '--';
                    $this->getTreeCategoriesAdmin($category['id'], $tree, $categories, $st);
                    $st = '';
                }
            }
        }
        return $tree;
    }

    /**
     * Get array title category
     * user for admin
     *
     * @return  [type]  [return description]
     */
    public static function getListCategoryGroupByParentAdmin()
    {
        if (self::$getListCategoryGroupByParentAdmin === null) {
            self::$getListCategoryGroupByParentAdmin = self::select('id', 'parent_id')
                ->get()
                ->groupBy('parent_id')
                ->toArray();
        }
        return self::$getListCategoryGroupByParentAdmin;
    }

    /*
     *
     *
     * */
    public function getListTitleAdmin(): array {
        // Sử dụng phương thức pluck để lấy ra một cặp key-value
        $loaisanphams = Loaisanpham::pluck('tenloai', 'id');

        // Chuyển đổi Collection thành mảng
        return $loaisanphams->toArray();
    }
}
