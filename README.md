<h3>Google Cloud Storage application</h3>

A basic Google Cloud Storage application with Reactjs frontend + Laravel api.This application covers basic auth flows like login , register, reset password, forgot password,Admin dashboard, File Upload to Google Cloud, File Download, Delete File and Retrieve Deleted Files.

Please follow the below steps to run the project.This steps are for those who have laravel , composer and node installed in your local machine.If not, please proceed with the steps after installing the same.

<h4>Requirements</h4>
<hr>
 <li>PHP >= 7.1.3</li>
                                       <li>OpenSSL PHP Extension</li>
                                                <li>PDO PHP Extension</li>
                                                <li>Mbstring PHP Extension</li>
                                                <li>Tokenizer PHP Extension</li>
                                                <li>XML PHP Extension</li>
                                                <li>Ctype PHP Extension</li>
                                                <li>JSON PHP Extension</li>
      
<h4>Steps</h4>
<li> 1) Run composer install to install your php dependencies.</li>
<li>2) Run npm install to instal the node packages.</li>
<li>3) Create a database of your own choice in mysql and configure your db in the .env file.</li>
<li>4) Run php artisan migrate to scaffold your db with the required tables for your application</li>
<li>5) Run npm run dev .</li>
<li>6) Run php artisan serve .</li>
<li>6) Create an account on Google Cloud platform</li>
<li>7)Add a Google Cloud Credentials to your filesystems.php config</li>
<pre>
<span>
'gcs' => [
    'driver' => 'gcs',
    'project_id' => env('GOOGLE_CLOUD_PROJECT_ID', 'your-project-id'),
    'key_file' => env('GOOGLE_CLOUD_KEY_FILE', null), // optional: /path/to/service-account.json
    'bucket' => env('GOOGLE_CLOUD_STORAGE_BUCKET', 'your-bucket'),
    'path_prefix' => env('GOOGLE_CLOUD_STORAGE_PATH_PREFIX', null), // optional: /default/path/to/apply/in/bucket
    'storage_api_uri' => env('GOOGLE_CLOUD_STORAGE_API_URI', null), // see: Public URLs below
],
</span>
</pre>
<li>8)Launch Application</li>

<h4>Online Demo</h4> 
<li href="https://operating-pod-205321.appspot.com">https://operating-pod-205321.appspot.com</Li>
