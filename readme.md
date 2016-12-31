
From my experience there are two ways to learn code; for instance with f3 download ,read 
documentation & get on with it.Another way is to download a roughly working web using 
f3 & to take a watch makers analogy -take it apart & see how it ticks.
This ready to run is basically a clone of http://ghanalug.org [ghanalug.org](http://ghanalug.org)


This is a ready to 'ready to Rock & Roll' web convoluted perhaps to some professional 
coders & maybe rough around the edges.For instance in PHP classes i used a lot of $this-class member
when i could have just used variables inside functions. oh well mark II might be down the road.

Anyway its almost ready to R&R since it uses sqlite3 database so there is no create tables etc as would be the case with MySQl

The main features are:

1) It uses Twitterbootstrap so its fairly smart phone (therefore Google friendly) ;just minimize Browser Window & you should see menu change to toggle type.

2) Class page in controllers handles all static pages where there is no specific route set up for the page.
For instance /template loads /template.htm  & /contact_us loads contact_us.htm 
All pages are in ui folder. To create More pages just open template ,edit text & save it to the page you want eg about_us.htm then create a link to
about_us such as 

```
  
<a href ="/about_us">about us</a>
```

I have tried to minimize pages that show eg footer info etc & are: 
blogTitles.htm, page.htm, blogArticle.htm & page2.htm


3) Specific routes are listed in routes.ini 

4) There is a basic form GUI in order to submit a blog ,which is just a case of copy & paste text into form text boxes of :title & main article
There is a browse button to search for & upload one image for the blog which should be circa 350 px wide x 350 px height
 In my case i will be submitting all blogs, so i have not bothered with checking if file is a genuine image etc, or filtering characters which might make sqlite3 choke.
 I have found that sqlite3 is much more robust than MySQl since you can paste ' into the text box & sqlite can handle it.MySQl would throw a wobbly 
 In order to successfully submit a blog at  /blogSubmitForm you need to be logged in as admin.

 5) Login is at /userLogin default name & pass are user:admin pass:admin

 6) To change default admin password login first using default & then go to /adminRSPW
 it will change hashed password  in users table of sqlite3.Logout & login using new password
 
 7) The blog will allow for user comments - there is a status field  of either 0 or 1 so that it can be used 
 to either show or hide comments but i have not implemented it yet. Also i have added pagination
 
 8) The web users a basic MVC - i can't get my head around ORM so i mostly use PDO

9) I aim to add forum code at a later date  so there is a route /userRegistration which can be developed later



