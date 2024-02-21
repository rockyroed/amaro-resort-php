# Program Title: Amaro Resort Online Reservation System

Date Written: July 23, 2023
Date Revised: February 20, 2024

### Programmers
- Boyles, Christian Roed P.
- Erandio, Trisha Mae M.
- Francisco, John Rey P.
- Mamansag, John Michael Vincent

### Where the program fits in the general system designs
This system is a comprehensive solution to enhance the guest experience and streamline the reservation process within the hospitality industry. It integrates various subsystems and functionalities, including accommodation booking, activity scheduling, event planning, and secure payment processing, into a cohesive and user-friendly online platform.

### Purpose
The general objective of the Online Reservation System for Amaro Resort is to enhance the guest experience by providing a user-friendly and efficient platform for online reservations.

### Data Structures, Algorithms, and Control:
- Data Structures
    - This system makes use of session storage, which offers a means to temporarily organize and store data. Each entry in session storage consists of a key-value pair, representing a data piece that users can access and modify while interacting with the webpage.
- Algorithms
    - The system employs a hashing algorithm, specifically PASSWORD_BCRYPT in PHP, to securely hash user passwords. This algorithm transforms the passwords into irreversible and unique hash values, providing an added layer of protection against unauthorized access. By utilizing PASSWORD_BCRYPT, the system ensures that passwords are securely stored in a manner that makes it extremely difficult for attackers to decipher the original passwords even if they gain access to the hashed values. This approach enhances the overall security of the system, safeguarding sensitive user information from potential threats.
- Control
    - Validate Pax Number
        - Checks for the pax number if it's equal or less than the cottage type selected, to make sure that the requirements are matched.