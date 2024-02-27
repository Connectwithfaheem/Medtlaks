<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\customer;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
class MyWebsiteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   public function test_index_route()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test if the ebook route is working.
     *
     * @return void
     */
    public function test_ebook_route()
    {
        $response = $this->get('/ebook');
        $response->assertStatus(200);
    }

    // Continue adding test methods for other routes...

    /**
     * Test if the forget_password_change route is working.
     *
     * @return void
     */
    public function test_forget_password_change_route()
    {
        // Replace 1 with the actual ID of a customer who has access to the route
        $userId = 1;

        // Manually set the authenticated user's ID in the session
        $this->session(['FRONT_USER_ID' => $userId]);

        // Access the forget_password_change route
        $response = $this->get('/forget_password_change/'.$userId);

        // Assert that the response status is a redirect (302)
        $response->assertStatus(302);

        // Follow the redirect and assert that the redirected page is the expected one

        $response->assertRedirect('/');// Adjust the redirect URL as per your application

        // You might need to assert other things on the redirected page, such as checking for login form elements
    }

        /**
     * Test the about route.
     *
     * @return void
     */
    public function test_about_route()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }



    /**
     * Test the contact route.
     *
     * @return void
     */
    public function test_contact_route()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }




    /**
     * Test the privacy-policy route.
     *
     * @return void
     */
    public function test_privacy_policy_route()
    {
        $response = $this->get('/privacy-policy');
        $response->assertStatus(200);
    }

    /**
     * Test the terms-and-condition route.
     *
     * @return void
     */
    public function test_terms_and_condition_route()
    {
        $response = $this->get('/terms-and-condition');
        $response->assertStatus(200);
    }

    /**
     * Test the enquiry route.
     *
     * @return void
     */
    public function test_enquiry_route()
    {
        $response = $this->get('/enquiry');
        $response->assertStatus(200);
    }

    /**
     * Test the logout route.
     *
     * @return void
     */
    public function test_logout_route()
    {
        $response = $this->get('/logout');
        $response->assertStatus(302); // Assuming logout redirects to the home page
    }

    /**
     * Test the login_process route.
     *
     * @return void
     */


    /**
     * Test the register route.
     *
     * @return void
     */
    public function test_register_route()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    /**
     * Test the product_review_process route.
     *
     * @return void
     */
    public function test_product_review_process_route()
    {
        // Simulate a POST request to the product_review_process route with appropriate data
        $response = $this->post('/product_review_process', ['product_id' => 1, 'review' => 'This is a test review']);
        $response->assertStatus(200); // Assuming product_review_process returns a success response
    }

    /**
     * Test the forget_password route.
     *
     * @return void
     */
    public function test_forget_password_route()
    {
        // Simulate a POST request to the forget_password route with appropriate data
        $response = $this->post('/forget_password', ['email' => 'test@example.com']);
        $response->assertStatus(200); // Assuming forget_password returns a success response
    }



    /**
     * Test the forget_password_change_process route.
     *
     * @return void
     */
    public function test_forget_password_change_process_route()
    {
        // Simulate a POST request to the forget_password_change_process route with appropriate data
        $response = $this->post('/forget_password_change_process', ['userId' => 1, 'password' => 'newpassword']);
        $response->assertStatus(200); // Assuming forget_password_change_process returns a success response
    }



    // /**
    //  * Test the BlogDetail route.
    //  *
    //  * @return void
    //  */
    // public function test_blog_detail_route()
    // {
    //     // Replace 'custom_url' with an actual parameter value
    //     $customUrl = 'example-url';

    //     // Simulate a GET request to the BlogDetail route
    //     $response = $this->get('/BlogDetail/'.$customUrl);
    //     $response->assertStatus(200); // Assuming BlogDetail returns a success response
    // }
        // /**
    //  * Test the Special route.
    //  *
    //  * @return void
    //  */
    // //public function test_special_route()
    // // {
    // //     $response = $this->get('/Special');
    // //     $response->assertStatus(200);
    // // }
    //     /**
    //  * Test the category route.
    //  *
    //  * @return void
    //  */
    // public function test_category_route()
    // {
    //     $response = $this->get('/category');
    //     $response->assertStatus(200);
    // }
    //     /**
    //  * Test the TopBlogs route.
    //  *
    //  * @return void
    //  */
    // public function test_top_blogs_route()
    // {
    //     $response = $this->get('/TopBlogs');
    //     $response->assertStatus(200);
    //}
    // public function test_login_process_route()
    // {
    //     // Simulate a POST request to the login_process route with appropriate data
    //     $response = $this->post('/login_process', ['email' => 'contactfaheemali@gmail.com', 'password' => '12345678']);
    //     $response->assertStatus(302); // Assuming login redirects to another page upon successful authentication
    // }

}
