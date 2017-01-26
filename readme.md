

There are two purposes for this project. One came from talking to SME's where really 
they just want something light - a basic website  of static pages,a contact form where people
can get back to them  & functionality of being able to submit a blog (including a picture)
into a GUI on the live web site.

Also if they need help from someone , they want it to be fairly easy for 
someone with a little PHP knowledge to be able to do this.One thing 
about fatfree is its very easy to use your own PHP classes & native PHP



Also from my experience there are two ways to learn code; for 
instance with f3 download the zip ,read documentation & get on with it.

 Another way is to download a roughly working web , or to put it another way 
somebody's use of the developers download  & to take a watch makers analogy -take it apart 
& see how it ticks.This almost ready to run is basically a clone of 
[ghanalug ](http://ghanalug.org)


Login using link on menu. Default login is:
user:admin
pass:Englishman




The main points /features are:

1) On login as admin you should see a couple of links quoted where you can 
change the default password & link to submit a blog.  


2) It uses Twitter bootstrap so its fairly smart phone (therefore Google friendly) ;
just minimize Browser Window & you should see menu change to toggle type.Everything including header image should shrink

3) Class page in api/controllers  handles all static pages where there is no specific
 route set up for a  page. http://www.somedomain/ is going to cause problem for the controller
 page because the bit after "/" is blank. Thus "/" is handled by the route 
 GET /=Home->index 
 
 To get rid of all the stuff below <p> Welcome to home page which is home.htm in ui </p>
 
 get rid off the code block below 
 
```
 
 <?php echo Markdown::instance()->
		convert(Base::instance()->read('readme.md')); ?>   which is in home.htm
 
```


 
 
 

All pages including home.htm are in ui folder. To create More pages just open template.htm with a text editor
(template in the context
 of starting with rough blueprint) ,edit text & save it to the page you want eg about_us.htm 
 then create a link to about_us such as 

```
  
<a href ="/about_us">about us</a>
```

Page class also catches none existent pages (such as the above) at the moment & if you try it , 
system should pick up it does not exist

You could have hundreds of static pages & they will all be handled by page class. 
Which injects the content into page.htm

For the blog i had to alter page.htm & add a couple of other pages to make it work including  
blogTitles.htm,  blogArticle.htm . So you are going to have to edit menu & footer section so  
it all matches. 


4) Specific routes are listed in routes.ini 
4a) Config for values including for SMTP setup for contact_us to work are in config.ini

5) There is a basic form GUI in order to submit a blog ,which is just a case of copy & paste 
text into form text boxes of title, key words , article. key words are used to populate meta tags
There is a browse button to search for & upload one image for the blog which should be circa
 350 px wide x 350 px height.  In my case i will be submitting all blogs, so i have 
 not bothered with checking if file  is a genuine image etc, or filtering characters 
 which might make sqlite3 choke. You can use 

```
 <p> </p>  for outside of paragraph's & also <br>
 
 
 ```
 6) I have found that sqlite3 is much more robust than MySQl since you can paste ' into the text box & sqlite can handle it.MySQl would throw a wobbly 
 In order to successfully submit a blog at  /blogSubmitForm you need to be logged in as admin.
 You an even work locally populate the andyDb & just load it back up to your live web.

 
 
 7) The blog will allow for user comments - there is a status field  of either 0 or 1 so 
 that it can be used  to either show or hide comments but i have not implemented it yet, 
 so the default is all comments will show. I have NOT yet   added pagination
 One quirk thing is text for image path in blogImages saves to db in 
 lower case, so if you call an image SomeImage.png it will be there , 
 but Will not be seen on blogArticle page
 
 
 8) The web users a basic MVC - i can't get my head around ORM 
 so i mostly use PDO. Some code needs shifting from controller to model

9) I aim to add forum code at a later date  so there is a route /userRegistration which can be developed later

10) The home of fatfree is  [fatfree ]( https://fatfreeframework.com/3.6/home ) in case you are in a difficult
access to Internet i left the fatfree docs which are at /userRef

