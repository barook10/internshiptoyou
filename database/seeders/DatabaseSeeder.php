<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => 'Mubarak'
        ]);

        $user2 = User::factory()->create([
            'name' => 'Omar'
        ]);

        $category1 = Category::factory()->create([
            'name' => 'Information Technology'
        ]);

        $category2 = Category::factory()->create([
            'name' => 'Accounting'
        ]);

        $category3 = Category::factory()->create([
            'name' => 'Business'
        ]);

        Post::factory(3)->create([
            'user_id' => $user1->id,
            'category_id' => $category1->id,
            'title' => 'IT Intern',
            'excerpt' => 'Exciting internship opportunity for a motivated IT student to gain hands-on experience.',
            'salary' => 15000,
            'body' => 'We are offering a summer internship for an IT student who is eager to learn and contribute to our technology projects. This internship provides a great opportunity to work with cutting-edge technologies and grow your skills in a collaborative environment.'
        ]);

        Post::factory(2)->create([
            'user_id' => $user2->id,
            'category_id' => $category2->id,
            'title' => 'Accounting Intern',
            'excerpt' => 'Join our finance team as an accounting intern and kickstart your career in accounting.',
            'salary' => 12000,
            'body' => 'We are seeking an enthusiastic accounting student to join our internship program. As an accounting intern, you will have the chance to work on real financial tasks, learn from experienced professionals, and gain valuable insights into the world of corporate finance.'
        ]);

        Post::factory(4)->create([
            'user_id' => $user1->id,
            'category_id' => $category3->id,
            'title' => 'Business Development Intern',
            'excerpt' => 'Exciting internship opportunity for a business student passionate about sales and strategy.',
            'salary' => 13000,
            'body' => 'Our business development internship is designed for students who want to explore the field of sales and strategy. You will have the chance to work closely with our business development team, participate in client meetings, and contribute to the growth of our company.'
        ]);

        Post::factory(3)->create([
            'user_id' => $user2->id,
            'category_id' => $category3->id,
            'title' => 'Operations Intern',
            'excerpt' => 'Join our operations team as an intern and get hands-on experience in optimizing business processes.',
            'salary' => 14000,
            'body' => 'We are offering a dynamic operations internship for students interested in streamlining business processes. The operations intern will work closely with various teams, assist in project management, and play a key role in enhancing operational efficiency.'
        ]);
    }
}
