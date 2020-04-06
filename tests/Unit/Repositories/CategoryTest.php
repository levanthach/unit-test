<?php 
namespace Tests\Unit\Repositories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\CategoryRepository;
use App\Category;
use Faker\Factory as Faker;

class CategoryTest extends TestCase
{
	protected $category;
	public function setUp() : void
	{
		parent::setUp();
		$this->faker = Faker::create();
		// Tạo dữ liệu để Test
		$this->category = [
			'name' => $this->faker->name,
			'description' => $this->faker->text,
		];
		// khởi tạo lớp CategoryRepository
		$this->categoryRespository = new CategoryRepository();
	}
	 /**
     * A basic unit test store
     *
     * @return void
     */
    
    public function testStore()
    {
    	// Gọi hàm tạo
    	$category = $this->categoryRespository->storeCategory($this->category);

    	// Kiem tra xem ket qua tra về có là thể lớp Category ko ?
    	$this->assertInstanceOf(Category::class, $category);
    		// Kiem tra data tra ve
    	$this->assertEquals($this->category['name'], $category->name);
    	$this->assertEquals($this->category['description'], $category->description);
    	// Kiem tra du lieu co ton tai trong database ko.
    	$this->assertDatabaseHas('categories', $this->category);

    }

    public function testShow(){
    	//Tao du lieu mau
    	$category = factory(Category::class)->create();
    	$found = $this->categoryRespository->showCategory($category->id);
    	$this->assertinstanceOf(Category::class, $category);
    	$this->assertEquals($found->name, $category->name);
    	$this->assertEquals($found->description, $category->description);
    }

    public function testUpdate() 
    {
    	$category = factory(Category::class)->create();
    	$newCategory = $this->categoryRespository->updateCategory($this->category, $category);
    	// Kiem tra du lieu tra ve
    	$this->assertInstanceOf(Category::class, $category);
    	$this->assertEquals($this->category['name'], $category->name);
    	$this->assertEquals($this->category['description'], $category->description);
    	// Kiem tra xem co so du lieu da duoc update chua ?
    	$this->assertDatabaseHas('categories',$this->category);
    }
    
    public function testDestroy(){
    	$category = factory(Category::class)->create();
    	$deleteCategory = $this->categoryRespository->destroyCategory($category->id);
    	$this->assertInstanceOf(Category::class, $category);
    	// Kiem tra du lieu co tra ve true hay ko?
    	$this->assertTrue($deleteCategory);
    	//Kiem tra xem du lieu duoc xoa trong database chu
    	$this->assertDatabaseMissing('categories', $category->toArray());
    }

}
?>