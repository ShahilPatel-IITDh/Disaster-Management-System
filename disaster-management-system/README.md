# Blood Bank Management System

Project by

- Ameen N (190010004)
- Mohammad Sameer (190010024)

## OVERVIEW OF THE PROJECT

Our project, Blood Bank Management System was built from the ground up keeping in mind ease of access for anyone wishing to sign themselves up for donating blood, as well as increasing accesibility for requesting to those in need.

## ER MODEL

The ER Model that we came up with is as follows:

![ER MODEL](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370562/monday/ERmodel_ollwxv.png)

A brief explanation of each of the entities listed is as follows:

**Donor**

> The donor entity deals with all the individuals who have registered in the system and are volunteering to donate blood. Along with their personal details such as name, gender, birth date etc, we also take into account whether they have a habit of smoking and whether they have any major diseases that would hinder healthy blood transfer.
>
> **BloodStock**
> This entity keeps track of all the blood that have been donated till date.
>
> **Recipient**
> Similar to the donor entity, but here we collect information regarding anyone requesting blood.
>
> **BloodType**
> This entity is used for assigning some ID numbers to all the 8 bloodtypes. We can see the relation canDonate which will have the blood compatiblity chart.

## DATABASE SCHEMA

![Database Schema](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370558/monday/tablesmodel_y9znla.png)

## INTEGRITY CONSTANTS

- For the table _BloodType_, the Primary Key has been chosen as typeID. This key will appear as Foreign Key in various tables throughout the database.
- For the table _BloodStock_, the Primary Key has been chosen as ID, with foreign keys as typeID (referencing _BloodType_) and donorID (referencing Donor)
- For the table _canDonate_, the Primary Key has been chosen as a combination of typeIDDonor and typeIDRecipient. Each of them are also the foreign keys, both referencing _BloodType_.
- For the table _Donor_, the Primary Key has been chosen as donorID, with typeID being a foreign key referencing _BloodType_.
- For the table _recieves_, the Primary Key has been chosen as a combination of ID and recipientID, both of them are also foreign Keys, with ID referencing _BloodStock_ and recipientID referencing _Recipient_.
- For the table _Recipient_, the Primary Key has been chosen as recipientID, with a foreign key being typeID, referencing _BloodType_.

## RELATIONAL DATABASE DESIGN

Our tables were designed as shown below:

**BloodType**

---

```sql
CREATE TABLE `BloodType` (
  `typeID` int NOT NULL,
  `typeName` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `BloodType`
  ADD PRIMARY KEY (`typeID`);
```

---

**BloodStock**

---

```sql
CREATE TABLE `BloodStock` (
  `id` int NOT NULL,
  `dateDonated` date NOT NULL,
  `typeID` int NOT NULL,
  `donorID` int NOT NULL,
  `isRecieved` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `BloodStock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeID` (`typeID`),
  ADD KEY `donorID` (`donorID`);
```

---

**canDonate**

---

```sql
CREATE TABLE `canDonate` (
  `typeIDDonor` int NOT NULL,
  `typeIDRecipient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `canDonate`
  ADD PRIMARY KEY (`typeIDDonor`,`typeIDRecipient`);
```

---

**Donor**

---

```sql
CREATE TABLE `Donor` (
  `donorID` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `isSmoker` int NOT NULL,
  `majorDiseases` int NOT NULL,
  `contactNo` char(10) NOT NULL,
  `typeID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `Donor`
  ADD PRIMARY KEY (`donorID`),
  ADD KEY `typeID` (`typeID`);

```

---

**receives**

---

```sql
CREATE TABLE `recieves` (
  `id` int NOT NULL,
  `recipientID` int NOT NULL,
  `dateRecieved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `recieves`
  ADD PRIMARY KEY (`id`,`recipientID`),
  ADD KEY `recipientID` (`recipientID`);

```

---

**Recipient**

---

```sql
CREATE TABLE `Recipient` (
  `recipientID` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `typeID` int NOT NULL,
  `contactNo` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `Recipient`
  ADD PRIMARY KEY (`recipientID`),
  ADD KEY `typeID` (`typeID`);

```

---

## LANGUAGES AND TECHNOLOGIES USED

We used _JDBC, J2EE, MySQL_ and _Java_ for the backend part. The UI design was done using bootstrap and CSS.

## INTERFACE DESIGN

As mentioned, bootstrap and CSS were used to design the UI part of our project. We made a navbar which acts as a menu for easy traversal between different parts of the project.

Various checks were also placed on client-side forms to ensure the integrity of data entered.

## WORKFLOW, PAGES AND SCREENSHOT

### HOMEPAGE

This is the first page that anyone sees when they visit the website, it has three options on the navigation bar, which are namely Donor Registration, Request for Blood and the (admin) Login page. All this functionality is present within the **Home.jsp** file.

![Homepage](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370559/monday/1_gwwe3q.png)

### DONOR REGISTRATION FORM

This is a form for anyone willing to volunteer to be a donor. In this page, various clientside checks have been implemented in the form to ensure that no data of the wrong type reaches the servlet files, and ultimately the database.

This is present in the **Add.jsp** file, and upon submission of the form, the user is redirected to **AddServlet.java** which is where the communication between our website and the backend SQL part is established. In this case the data entered on the .jsp form is entered into the table.

In case the user enters all valid details, they are redirected to another page which confirms that they have signed up as a blood donor. This page is **AddResult.jsp**.
![Donor Registration](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370559/monday/3_gurr9g.png)
![Donor Registration Succcess](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370564/monday/4_rr6vms.png)

### BLOOD REQUEST FORM

This is a form where those in need can request for a blood transfusion. Similar to the donor registration form, clientside checks have been implemented to ensure that data entered is as accurate and correct as possible.

This is present in the **Issue.jsp** file, and upon submission of the form, the user is redirected to **IssueServlet.java**, which is where the communication between our website and the backend SQL part is established.

In case the users enters all valid details, they are redirected to another page which confirms that they have signed up as a blood donor. This page is **IssueResult.jsp**.
![Blood Request Form](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370562/monday/6_qmcuhj.png)
![Blood Request Success](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370561/monday/7_nnjtgr.png)

### ADMIN LOGIN PAGE

An admin login page has been implemented where, upon successful entry of password and username they get redirected to the admin home page where they have access to admin-specific features. This is being handled by **Login.jsp** and **loginServlet.java**.

![Admin Login Page](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370558/monday/8_hjgltw.png)

### ADMIN HOME PAGE

Immediately after the admin logs in successfully, they are redirected to this page. They can view all active donors, view requests, view the compatibility chart, add a new donation, process requests, manage blood stocks, view processed transfusions and a log out button to go back to the home page. This is being handled by **adminHome.jsp**.

![Admin Home Page](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370558/monday/10_xkjtm4.png)

### VIEW ACTIVE DONORS

On this page, the admin can view all the currently registered users, as well as their personal details that they had entered. He can also delete whichever users as required. This is being handled by **DisplayDonors.java** and to display we use **displayDonors.jsp**.

![View Active Donors](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370560/monday/11_m0arow.png)

### VIEW REQUESTS

On this page, the admin can view all the requests, as well as their personal details that they had entered. This is being handled by **DisplayRequests.java**, and to display we use **recipientDisplay.jsp**.

![View Requests](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370560/monday/13_aosezr.png)

### COMPATIBLITY CHART

It is essential that the admin is aware of which blood type is compatible with which other bloodtypes in case of a transfusion. This is important for some upcoming steps as well. Which bloodtype can donate to which bloodtypes can be made out from this chart. In this case, **compatDisplay.jsp** handles this page.

![Compatiblity Chart](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370562/monday/14_m2mrrw.png)

### NEW DONATION

Registered donors can donate blood as they wish, this is handled through the webpage **newDonation.jsp**. On correctly entering the value, the user is redirected to a servlet **addDonation.java**. The success is indicated by the webpage **AddResult.jsp**.

![New Donation](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370563/monday/15_edgtjv.png)

![New Donation Success](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370561/monday/16_yvb1i0.png)

![New Donation Failed](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370561/monday/17_evnno0.png)

### PROCESS A REQUEST

Administrators can choose who is eligible to recieve any stock of blood that they currently possess. This is done by the webpage **processRequest.jsp**. On entering correct data, servlet **processRequest.java** handles the request. The result can be seen in **ProcessRequest.jsp**.

If either the bloodID or the recipient doesn't exist, or the blood given to the recipient isn't compatible according to the compatiblity chart, then an error is thrown.

![Process a Request](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370561/monday/16_yvb1i0.png)

![Process a Request Success](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370558/monday/20_agxrje.png)

![Process a Request Failed](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370564/monday/21_yq8gu1.png)

### BLOOD STOCK DISPLAY

The administrator can view the bloodtypes that are in stock, and whether hey have already been given away to anyone in need or not. The servlet is **_viewBloodStock.java_** and the result is shown **_viewBloodStock.jsp_**.

![Blood Stock](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370562/monday/22_rs4fy6.png)

### PAST TRANSFUSIONS

The administrator can see the transfusions that have already been processed.

The servlet is **_viewPast.java_** and the webpage is **_viewPast.jsp_**.

![Blood Stock](https://res.cloudinary.com/dynuzthsk/image/upload/v1635370562/monday/23_ifjckp.png)

## CONCLUSION

The project as a whole gave us good experience working with J2EE and gave us a glimpse at the full possibilities of just what can be achieved by using these frameworks the proper way.

Hands on experience was given with J2EE, JDBC, Java, and MySQL, as well as with using all of these frameworks together to achieve various goals that could prove useful in many daily life situations.
