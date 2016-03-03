*******************************************************************

* Title:  ExportContacts
* Author: [Matthew Boyette](mailto:Dyndrilliac@gmail.com)
* Date:   5/21/2012

*******************************************************************

This project demonstrates how to use PHP to export contact information from a MySQL database as a file using the CSV ("comma separated values") format which can then be imported by an application such as Microsoft Outlook or Mozilla Thunderbird.

The code is designed to be used in situations where an Exchange server or similar mechanism is not available to automatically populate the contact list for an individual belonging to an organization. It assumes that you have a table (called 'contact_table') of people in a MySQL database with at least the fields 'lname', 'fname', 'phone', and 'email'. This provides a robust way to take a database of people and extract the last name, first name, phone number, and email address of each person and build a universal contact list which can be distributed to all of the individual members of an organization as opposed to having those members tediously cultivate a contact list manually in an error prone fashion.