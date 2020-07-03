<h1 style="text-align:center;">Eastore is a Prototype of an Online Electronic E-Commerce Web App</h1>

<p style="text-align:justify;">
The project itself is created by following a youtube tutorial (https://www.youtube.com/watch?v=eAK8uYtNTy4). I created this project as a part of my learning milestone to become a full stack developer.

The project is built by utilizing bootstrap 4 and fontawesome 5 hosted locally. It also employs some basic of native php and mysqli. Different from the code shown in the original tutorial, this project consists some different html codes, css, and also some bug fixes. 

To be able to run this web app on your server (I assumed you already have your own server with mysql running). First of all you need to reload the index.php file in your browser. Once you reload the file in the browser, open your php my admin and look for Productdb database. Under the Productdb database look for productttb table, select SQL menu to run querry, then execute the following commands:

    INSERT INTO Productttb (product_name, product_price, product_image) VALUES
    ('LAPTOP HP 14S-DK0073AU', 320, './images/LAPTOP HP 14S-DK0073AU.png'),
    ('TV PLASMA LG LED 43UM7100', 400, './images/LG LED 43UM7100.png'),
    ('Logitech USB HD Webcam', 50, './images/Logitech USB HD Webcam.png'),
    ('Samsung Galaxy A71-Hitam', 580, './images/Samsung Galaxy A71 - Hitam.png')

After that, try to reload your browser again and enjoy the magic.

I would try to develop this basic web app with more contents and features in the future.

Cheers,
</p>