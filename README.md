# Shared Resource Booking System
A shared resource booking system with a web user interface, a web admin interface and a database.

## Set Up
To run this project, ensure you have VirtualBox and Vagrant installed on your machine. Using a terminal, clone this repository and cd into it. Then type the command 'vagrant up'. Once the three virtual machines have been set up, go to your web browser of choice. To access the user interface, put 192.168.2.11 in the address bar. To access the admin interface, put 192.168.2.13 in the address bar.

## Architecture
This booking system is set up using three separate virtual machines.
1. webserver: This VM hosts the interface users will interact with to book a court under their name. This VM reads data from the database stored on dbserver to display on the website to users and reads notices from a shared file that is edited by adminserver. It can also send data to dbserver, using an SQL INSERT, when a user enters a valid booking.
2. adminserver: This VM hosts the interface for admins to view who made what booking, delete bookings and update notices on the user web server. This VM reads data from the database stored on dbserver to display on the admin website. It can send data to the dbserver using an SQL INSERT or DELETE. It can also edit the shared file to update notices on the user website.
3. dbserver: This VM hosts the database which stores all of the court bookings. Data is sent to and from this VM to both webserver and adminserver as described above.
