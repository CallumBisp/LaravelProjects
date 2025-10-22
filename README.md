Week by week progress of the project

Week 1 - 29th of September

    I spent this week coming up with a suitable topic based on the ERD design we had been given (1 many to many relationship and 1 one to many relationship). I decided on doing about a game I was quite passionate abot, Hollow Knight. For CA1 we were tasked to build an application based on the middle table of the ERD, being areas. I also spent some time familiarising myself with common laravel terms.
        - MVC (model, view, controller) architecture, which is a way to choose and display certain bits of information. The controller takes in the request, what the user clicks on and wants to see. The model then takes that requests and decides what to send back in return. The controller then takes this response and brings it back to the user in the form of the View, or what the information actually looks like.
        - Migrations, which describe how tables and should be added to a database by determining their order, data type, whether or not they're a primary key and other meta data
        - Seeders, which actually populate the database with data

    This week overall was a good foundation and I felt confident about this project going into it.

Week 2 - 6th of October

    This week was mainly spent implementing the show feature, which would use a request to pull data from the database if it was open, and pass that data into a card component. The card would then display content based on what it had been given by the show request. This request and all others to do with the database were managed by the area controller class. This acted as the model, with the show function acting like the controller and the card acting like the view. I also created the create function, which worked similarly to the show function. The difference was that there was no previous information to pass into the create view, which was an empty form. Upon filling in the form, the information would be validated, all using the area controller. If the information was all valid, it would get put into the database via a store function. Otherwise, it would return you to the create form.

    I also started messing around a small bit with the stylings for different components

Week 3 - 13th of October

    This week I added the update and edit functions, which work very similarly to the create and store functions. The main difference is that instead of an empty form to add a new element to an existing table, it takes the id of whichever area you wish to edit and fills the form in with the values of that area so you can edit them however you like. I also figured out how to take the image of the area and blur it out to make a pretty cool looking background. A lot of time this week was also spent sizing the images properly so they would all be shown as the same dimensions regardless of how they were put in 

Week 4 - 20th of October 
    This week I gave the entire project another comb over, adding comments where applicable and doing the read me. I also took my demonstration video and added a bit more to the styling of the website overall.