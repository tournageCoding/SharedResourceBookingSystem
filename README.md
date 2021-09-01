# Shared Resource Booking System
A shared resource booking system with a web user interface, a web admin interface and a database.

## Set Up
To run this project, ensure you have VirtualBox and Vagrant installed on your machine. Using a terminal, clone this repository and cd into it. Then type the command 'vagrant up'. Once the three virtual machines have been set up, go to your web browser of choice. To access the user interface, put 192.168.2.11 in the address bar. To access the admin interface, put 192.168.2.13 in the address bar.

## Architecture
This booking system is set up using three separate virtual machines.
1. dbserver: This VM hosts the database which stores all of the data used by webserver and adminserver. The database has two tables; booked_sessions and notices. Data is sent to and from this VM to both webserver and adminserver as described below.
2. webserver: This VM hosts the interface users will interact with to book a court under their name and read the club notices. This VM reads data from dbserver (from the booked_sessions and notices tables) to display information to the users. It can also send data to dbserver (booked_sessions), using an SQL INSERT, when a user enters a valid booking.
3. adminserver: This VM hosts the interface for admins to view who made what booking, delete bookings and update notices on the user web server. This VM reads data from dbserver (from the booked_sessions and notices tables). It can send data to the dbserver using an SQL INSERT or DELETE. It can INSERT and DELETE to/from the booked_sessions and notices tables.
