
## Web Pages Needed
-  [x] one covering basic information of the company that we outlined in stage 1, such as the "our services" section 
-  [ ] one covering our contact information
-  [ ] one page to allow for searching of available products/services (more specific requirements attached)
-  [ ] one page to log in / create user / update user (customer)
-  [ ] one page to log in / create user / update user (staff)
-  [ ] one showing the cart allowing registered users (and maybe staff?) to purchase items from their cart

## Web Page Requirements (all or most pages)
- [ ] all pages must be suitable for a large screen size (desktop) AND;
- [ ] all pages must be suitable for mobile phones via Cordova
- [ ] all pages must be show sign in / log out + the username
- [ ] shopping cart system on relevant pages
- [ ] registered customers should be able to purchase items (and non registered should not)
- [ ] staff should be able to update items and other users
- consistent navigation system (navigation bar doesnt change locations randomly, etc)
- provides help/instructions for users on how to use the site
- make use of the html5 structural elements
- only use css to style

## Advanced Functional Requirements
- implement different user types with a login system and cookies to maintain login sessions
- add the ability for registered users (and staff?) to purchase from cart
- Use only the following technologies: HTML5, CSS, JavaScript, jQuery, Ajax, Cordova, PHP and MySQL


## Marks Breakdown
- Presentation quality of your documentation: 10%
- Basic Functionality: 30%, including
  - The basic information
  - Search by keywords
  - Search by browsing
  - Shopping cart
- Functionalities related to customers (20%), including
  - account registration and account modification
  - user logon and logout, and maintaining logon/logout status
  - product ordering
- Functionalities related to support staff (20%), including
  - satff account creation and modification
  - staff account logon and logout, and maintaining logon/logout status
  - user account addition, removal and modification
  - product addition, removal and modification (ie, adding products to the database, removing products from the database and modifying product details in the database)
- Cordova application: 20%


## Functional Requirements - Advanced
On top of the basic features described above, your application should provide different functionalities to three different types of users of the application: unregistered users, registered customers, and support staff from the company.

1. Unregistered Users: anyone without authentication is given access to all basic functionalities specified above, including search products/services by keywords and by browsing the and shopping cart.
2. Registered Customers: a registered customer has an account in the application. The customer's details are kept in the database. He/she needs to be authenticated before access is granted. Once access is granted, he/she can modify his or her personal details such as name, address, phone number and email address. He/she can also submit an order for the company's products or services in the shopping cart. After it is validated by the client-side script, this order is sent to the server-side script for processing. The client will then display the confirmation or rejection of the order (perhaps because not enough stock is available). If the order is confirmed, the database should be updated. Please note that anyone can register an account with the application to become a customer of the company without the involvement of the company support staff. A registered user can log on and log off to the website. The website should maintain a sign to show whether the user is currently logged on or not (eg, by displaying the name of the user who is currently logged on).
3. Support Staff: a support staff member has an account with the application. He/she needs to be authenticated before access is granted. Once access is granted, he/she can access any customer account including addition, removal and modification of customer accounts without using customers' passwords. He/she can also modify product/service details in the database, such as adding a new product to the database, removing an existing product from the database, or changing the details of an existing product (e.g., stock level). Please note that a support staff member can create new support staff accounts.
> The information about the registered customers and support staff must be kept in the database, never hard coded in the application. Adding or removing an account should not change your application code in any way except the contents of the database.
Note that any registered customer and support staff member should still be able to access the basic information and use the search facility just like any unregistered user, whether they are authenticated or not.


## Technical Requirements
1. Use only the following technologies: HTML5, CSS, JavaScript, jQuery, Ajax, Cordova, PHP and MySQL. Do not use any web content management system. Do not use any third-party frameworks or libraries unless you have obtained a prior approval from your lecturer.

2. You are required to design and implement the following two front ends (clients) for this application:
  - a web front end suitable for large screen size (such as those in a desktop or laptop computer).
  - a Cordova front end packaged for mobile phones running Android or iOS.

3. As the screen size for the Cordova app is considerably smaller than that of the web front end, the screen layout for the Cordova app may need to be redesigned. It is not acceptable to just to shrink the same screen layout for the small screen Cordova front ends.
> For the Cordova app, you must test the app on a mobile device or on a mobile device emulator such as Android simulator or an iPhone emulator and include these test cases in the test documentation.

4. The server part of the application must be written in PHP and MySQL. The same code base should serve both front ends.

5. Communication between the client and the server must be achieved by using Ajax with the appropriate data exchange formats such plain text, XML or JSON. Your client will need to communicate with the server when it searches for products, changes product details or updates user accounts.

6. The information on the company's products must all be kept in the database on the server. The information about a particular product can be dynamically retrieved from the database in response to user enquiry and sent to the client for display. Addition, removal and update of product details should in no way change the application code or resource except the contents of the database.

7. The information on customer accounts and staff accounts must all be kept in the database on the server. Adding, removing or updating a user account means changing what are stored in the database, and should in no way change the appication code or resources.

8. For the sake of clear structure and sharing of server code, your client and server code as well as resources are to be stored in the following sub-directories:
- Server: the server code and resources must be stored under sub-directory Server. This same server code provides its service to both the web client and the Cordova client.
- WebClient: the client code and resources for the large screen web front end should be placed under sub-directory WebClient
- Cordova: the client code and resources for the client part of Cordova app (i.e., everything under the Cordova project directory of your Cordova app) are placed under sub-directory Cordova (it shares the same server code and resources used by the web front end).
Except the client part of Cordova code and resources, all the other code and resources of your application must be hosted on the eris server. There is no need (and no point) to host the Cordova code on eris server.

9. Both the web application and the Cordova application should be designed as a Single Page Application. Each asynchronous JavaScript client should be placed in a separate JavaScript file and each corresponding PHP server script should be placed in a separate PHP file. The pair of asynchronous JavaScript file and its corresponding PHP script file should use the same file name with different extension name.

# nana-project
