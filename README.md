# Setting up and running this project

1. In your root folder, Clone the repository
    
    ```jsx
    git clone https://github.com/whoispratik/LaraTodo.git
    ```
    
2. Go to your project folder
    
    ```jsx
    cd LaraTodo
    ```
    
3. Install php dependencies
    
    ```jsx
    composer install
    ```
    
4.  create a .env file and generate key for this project
    
    ```jsx
    cp .env.example .env
    php artisan key:generate
    ```
    
5. Database Setup and migration
    1. If you are using MySQL like me then make some changes to your .env in this manner
        
        ```jsx
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=TodoClone
        DB_USERNAME=root
        DB_PASSWORD=root
        ```
        
    2. then run the migration
        
        ```jsx
        php artisan migrate
        ```
        
6. Install Frontend Dependencies
    
    ```jsx
    npm install
    ```
    
7. Finally running your project in Laravel 12 this one command is enough 
    
    ```jsx
    composer dev
    ```
    

Then go to [http://127.0.0.1:8000](http://127.0.0.1:8000/) as shown in your terminal

# My Design Choices

Let me provide you a high level overview to my design choices.

## For Database and Eloquent

1. Database Schema for todos table
    
    → So i decided having a title field, is_completed field for filtering logic,  due_date field to demonstrate date validation and a foreign key named user_id  for establishing relationship between users table and todos table.
    
2. Database Relationships
    
    Defined a 1 to many relationships between User and Todo models
    
    ```php
     // in User.php
     public function todos()
        {
            return $this->hasMany(Todo::class);
        }
    ```
    
    ```php
    // in Todo.php
    public function user()
    {
    		  return $this->belongsTo(User::class);
    
    }
    ```
    

## For Routing

I decided on making a resource controller and then defining a resourceful route in web.php as this way i would get ready made routes for crud operations along with its methods and then one more route not a resourceful route which would be for marking operation i.e for marking a task complete, incomplete.

```php
php artisan make:controller TodoController --model=Todo --resource 
```

```php
// in web.php

Route::resource('todos', TodoController::class)->middleware(['auth']);

Route::patch('todos/{todo}/mark', [TodoController::class, 'mark'])->name('todos.mark')->middleware(['auth']);

```

## For Validation

As a seperation of concern and to make the controller methods even thinner I decided having validation logic in Form Request Classes.

I created two form request classes CreateTodoRequest.php and UpdateTodoRequest.php

## For Business Logic

As another seperation of concern and to make the controller methods now  simply act as a entry point  i made Action Classes defined in **app/Actions where :**

- CreateTodoAction.php
- ReadTodoAction.php
- UpdateTodoAction.php
- DeleteTodoAction.php
- MarkTodoAction.php

were created.

## For Filtering

i had decided to include a field is_completed to implement a filtering logic

- The field
    
    ```php
    $table->boolean('is_completed')->default(false);
    
    ```
    
- The query scopes defined in Todo Model
    
    ```php
    
        public function scopeCompleted(Builder $query)
        {
            return $query->where('is_completed', true);
        }
    
        public function scopeIncomplete(Builder $query)
        {
            return $query->where('is_completed', false);
        }
    ```
    
- The controller method index
    
    ```php
        public function index(Request $request, ReadTodoAction $readTodoAction)
        {
            //
            return $readTodoAction->execute($request);
        }
    ```
    
- The Action class ReadTodoAction.php and how filtering logic was handeled
    
    ```php
    <?php
    
    namespace App\Actions;
    
    use Illuminate\Http\Request;
    
    class ReadTodoAction
    {
        public function execute(Request $request)
        {
            $query = $request->user()->todos();
    
            if ($request->query('status') === 'completed') {
                $query->completed();
            } elseif ($request->query('status') === 'incomplete') {
                $query->incomplete();
            }
    
            return inertia('Todo/Index',
                [
                    'todos' => $query->get(),
                    'filter' => $request->query('status', 'all'),
                ]);
        }
    }
    ```
    

# Evidence of using Laravel Pint and Php Rector

## Laravel Pint

i used laravel pint and that is demonstrated in two commits 

- [**style: ran pint commands to fix code styles**](https://github.com/whoispratik/LaraTodo/commit/01f905f0a47c9692d515d344ce6d5fff69a26083)
- [**style: ran one pint command for one file**](https://github.com/whoispratik/LaraTodo/commit/d4aeb7423feb628f08a57b7d97d434cf40c32a00)

command screenshots from  my terminal : https://imgur.com/a/2dvBa9r

## Php Rector

I used Php Rector and that is demonstrated in two commits

- [**style: made some code style changes via rector**](https://github.com/whoispratik/LaraTodo/commit/a3ac4024a2a1bb4fe2b16024753d33ff9c313fc0)

command screenshots from  my terminal : https://imgur.com/a/2dvBa9r
