# Poppleton Dog Show 

## Features

The **Poppleton Dog Show** website consists of multiple pages and functionalities, offering users a rich experience. Below is a description of the key features:

### 1. **Sign-In & Sign-Up Pages**

   - **Sign-In Page**: New and returning users can log in using their credentials to access their personalized content and dashboard.
   - **Sign-Up Page**: New users can create an account by providing basic registration details. Once signed up, users can log in and enjoy all website features.

### 2. **Home Page**

   - **Top 10 Dogs**: The home page displays a table of the top 10 dogs in the competition, providing valuable information about each dog and its performance. 
   - **Table Columns**: The table has 7 columns:
     - **Dog ID**: A unique identifier for each dog.
     - **Dog Name**: The name of the dog.
     - **Breed Name**: The breed of the dog.
     - **Event Count**: The number of events the dog has participated in.
     - **Average Score**: The dog's average score in the competition.
     - **Owner Name**: The name of the dog's owner, which is a clickable hyperlink.
     - **Owner Email**: The email address of the dog’s owner, which is also a clickable hyperlink.

   - **Hyperlinks**:
     - **Owner Name**: Clicking on the owner's name takes the user to the **Owner Details** page, where more information about the owner is displayed.
     - **Owner Email**: Clicking on the owner’s email address opens the user’s email application, allowing them to quickly send an email to the owner without typing the email address manually.

### 3. **Competition Page**

   - **Table Columns**: The competition page displays a table of all competitions with the following 5 columns:
     - **Competition ID**: A unique identifier for each competition.
     - **Competition Day**: The date when the competition takes place.
     - **AM/PM**: The time of day the competition will be held.
     - **Event ID**: The unique identifier for each event in the competition.
     - **Event Name**: The name of the event.

### 4. **Owner Page**

   - **Table Columns**: This page provides a table that lists all the owners with their contact details:
     - **Owner ID**: A unique identifier for each owner.
     - **Owner Name**: The name of the owner, which is a clickable hyperlink that leads to the **Owner Details** page.
     - **Owner Address**: The address of the owner.
     - **Owner Email**: The email address of the owner, which is a clickable hyperlink that opens the user’s email application.
     - **Phone Number**: The phone number of the owner.

### 5. **Owner Details Page**

   - This page provides detailed information about a specific dog owner. Users can access this page by clicking on the owner's name or email from the **Home Page** or **Owner Page**.
   - It includes contact details, address, and other relevant information about the owner.

### 6. **Dog Details Page**

   - **Table Columns**: This page provides a table with details about each dog:
     - **Dog ID**: A unique identifier for the dog.
     - **Dog Name**: The name of the dog.
     - **Owner ID**: A clickable hyperlink that takes users to the **Owner Details** page for the dog’s owner.
     - **Breed Name**: The breed of the dog.

## Architecture

The website is powered by **Selene** as the server, which stores all the critical data about dogs, owners, and competitions. This setup ensures that the website functions smoothly, with real-time access to the data that drives the tables and details on the pages.

## Pages Overview

- **Home Page**: Displays the top 10 dogs, with detailed information and interactive hyperlinks for dog owners.
- **Competition Page**: Provides information about upcoming competitions, their dates, and event details.
- **Owner Page**: Lists all owners with their contact details and links to detailed owner information.
- **Owner Details Page**: Displays detailed information about a specific dog owner.
- **Dog Details Page**: Showcases specific details about a dog, including their name, ID, and breed.

## How to Use

1. **Sign Up/Sign In**: 
   - Users must sign up if they are new to the website or sign in if they already have an account.
   
2. **Explore the Home Page**: 
   - View the table of the top 10 dogs in the competition. Click on the owner's name to go to their detailed profile, or click on their email to directly send them an email.

3. **Browse the Competition Page**: 
   - Navigate to the competition page to check out available competitions, their dates, and event details.

4. **View Owner Information**: 
   - On the Owner page, you can see a list of all owners with contact details. Click on the owner’s name or email to learn more about them or contact them directly.

5. **Dog Details**: 
   - Visit the Dog Details page to explore specific information about a dog, including their breed and their owner’s details.

## Technologies Used

- **PHP**: For backend server-side scripting and handling user requests.
- **Selene**: As the database server to manage and store all the data related to dogs, owners, and competitions.
- **HTML/CSS**: For structuring and styling the pages.
- **JavaScript**: To enhance user interaction and provide dynamic functionality.
- **MySQL**: For managing the relational database of users, dogs, owners, and competitions.
