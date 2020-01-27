# simple-order-form

# basic idea
- have a webshop (henceforth refered to as platform) that integrates with other webshops and adds functionality (time share product with people where you live; purchase in group to get discount)
- sources of inspiration: drop.com, Ibood.com, Google Flights, crowdfunding, 'groepsaankopen', time shares, 
- BeCode group project 

## implementation
### example webshop
- frond-end: React, Bootstrap 4
- back-end: API: PHP, MariaDB
### platform

## to do's
### example webshop
- frond-end/back-end: confirm purchase and update stock in database as a minimum to continue with the platform
### platform
- frond-end

NOTE: didn't progress as expected due to a combination of illnesses, changing personal priorities (scoring internships) etc.

# ORIGINAL ASSIGNMENT BELOW

# Fullstack-challenge

- Repository: `online-shop`
- Type of Challenge: `Consolidation challenge`
- Duration: `10 days`
- Deadline: 17/01/20 16:30
- Deployment strategy : 
	- Heroku + remote DBA if possible
	- selfhosting
    - github pages 
- Team challenge : `yes (max 4)`
	- frontend: 2
	- backend: 2
	- project management : 1

## Objectives

The goal of this challenge is to integrate everything you have learned into one project. 
To do that you will create an online store. You are free to choose the subject and technologies you use for this challenge.

# Front-end

## What we want

- We want a landing page to present the platform in where you can tell us more about what you are selling.
- then you have access to the store with the different products.
- those product will be displayed by "cards" only with the title and the picture of the item.
- On click on the item, we will have a detailed overview of the product 
- Add a basket feature so every item you purchase is in your basket. then sum up the prices.
- create a checkout page where the customer can see his purchase.

Check with the back-end team how can you connect their code with yours.

## Notes

- You are free to choose the technologies you want for this challenge.
- The he use of front-end frameworks is allowed (optional)
- Add a registration / login to your webshop

- Go back to previous challenges to see 


# Backend

## Creating the backend structure

The goal for the backend is to create a database with atleast two tables:  

 - One for the products  
 - One for the users
 
The products displayed on your front-end will be fetched from this database and all users will be stored here. 

You can choose to use the **MVC structure** for you project or create an **API** to connect your front-end.