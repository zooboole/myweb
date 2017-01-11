

There are two purposes for this project. One came from talking to SME's where really 
they just want something light with the basiscs of static pages, contact form & functionality 
of being able to submit a blog into a GUI using the live web on remote server.
Also if they need help or add code, they want it to be fairly easy for 
someone with a little of PHP knowledge to be able to do this.One thing 
about fatfree is its easy to use your own PHP classes & native PHP



Also from my experience there are two ways to learn code; for 
instance with f3 download the zip ,read 
documentation & get on with it. Another way is to download a roughly working web , or to put it another way 
somebody's use of the developers download  & to take a watch makers analogy -take it apart 
& see how it ticks.


This almost ready to run is basically a clone of 
http://ghanalug.org [ghanalug.org](http://ghanalug.org)


Login using link on menu. Default login is:
user:admin
pass:admin

On login as admin you should see a couple of links quoted where you can 
change the defualt password & link to submit a blog.  




The main features are:

1) It uses Twitterbootstrap so its fairly smart phone (therefore Google friendly) ;
just minimize Browser Window & you should see menu change to toggle type.

2) Class page in controllers handles all static pages where there is no specific route set up for
a  page.For instance /template loads /template.htm  & /contact_us loads contact_us.htm 
All pages are in ui folder. To create More pages just open template.htm (template in the context
 of starting with rough blueprint) ,edit text & save it to the page you want eg about_us.htm 
 then create a link to about_us such as 

```
  
<a href ="/about_us">about us</a>
```

The above page does not exist & if you try it , system should pick up it does not exist

So you could have hundreds of static pages & they will all be handled by page class. Which injects 
content into page.htm

For the blog i had to alter page.htm & add a couple of other pages to make it work including  
blogTitles.htm,  blogArticle.htm & page2.htm. So you are going to have to edit footer in thse to match page.htm


3) Specific routes are listed in routes.ini 

4) There is a basic form GUI in order to submit a blog ,which is just a case of copy & paste 
text into form text boxes of title, key words , article. key words are used to populate meta tags
There is a browse button to search for & upload one image for the blog which should be circa 350 px wide x 350 px height
 In my case i will be submitting all blogs, so i have not bothered with checking if file 
 is a genuine image etc, or filtering characters which might make sqlite3 choke.
 
 I have found that sqlite3 is much more robust than MySQl since you can paste ' into the text box & sqlite can handle it.MySQl would throw a wobbly 
 In order to successfully submit a blog at  /blogSubmitForm you need to be logged in as admin.
 You an even work locally populate the andyDb & just load it back up to your live web.

 5) Login is at /userLogin default name & pass are user:admin pass:admin

 6) To change default admin password login first using default & then go to /adminRSPW
 it will change hashed password  in users table of sqlite3.Logout & login using new password
 
 7) The blog will allow for user comments - there is a status field  of either 0 or 1 so that it can be used 
 to either show or hide comments but i have not implemented it yet. I have NOT yet added pagination
 One quirk thing is text for image path in blogImages saves to db in lower case, so if you call an image SomeImage.png it will be there , but wil not be seen on blogArticle page
 
 
 8) The web users a basic MVC - i can't get my head around ORM so i mostly use PDO. Some code needs shiftintg from contgroller to model

9) I aim to add forum code at a later date  so there is a route /userRegistration which can be developed later



