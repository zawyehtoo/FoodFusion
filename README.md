![Screenshot_16-5-2025_173843_localhost](https://github.com/user-attachments/assets/f659f5de-4684-42c4-98ad-5bb5447583c5)

In my project folder, I have included "foodfusion.sql" SQL file.
 
Please import this "foodfusion.sql" SQL file into the MySQL Workbench.
__________________________________________________________________________________
 
"How to import self-contained SQL file"
- First open your MySQL workbench.
- And then connect to the localhost and it’ll open up a new window.
- Once you have the new window, you need to click on the schema and after that you’ll click on “create a new schema” in the icon tag.
- Then give it a name as "foodfusion.sql" and click “Apply” button then apply again and close.
- To import data, in the "Server" tab, click on "Data Import".
- Select "Import from Self-Contained File" and locate "foodfusion.sql".
- In default Target Schema field, choose your just newly created schema namely "foodfusion.sql" and click “Start Import”.
- Then, right click on newly created schema and click refresh all.
__________________________________________________________________________________
 
After importing "foodfusion.sql" to the workbench, please change your own MySQL database host, username, password, database name in "FoodFusion/include/db_connect.php" file of my project as follows:

    private $host = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $database = 'foodfusion';
    ![Screenshot_16-5-2025_174843_localhost](https://github.com/user-attachments/assets/f4a4389a-af11-48a9-8bfc-542ce26c5939)
![Screenshot_16-5-2025_173624_localhost](https://github.com/user-attachments/assets/e100cbbe-13c8-49ff-8bab-56dc79c96c90)
