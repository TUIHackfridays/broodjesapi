# TUI Broodjes App Architecture	
The TUI Broodjes App (sandwich app) provides a list of broodjes from one or more providers, from wich can be selected for delivery.

Environment factors:

-	Multiple providers
-	Multiple sandwiches
-	Options per sandwich
-	Various order deadlines
-	Cash versus online payment

The Broodjes App should be available on iOS, Android and online.

---

### Architecture
Considering this is a serious application, we need a multi-layered application architecture.

#### Backend & API
To limit the scope to an API-centric POC, and load-balancing is not yet required, we opted for a "folded" API & Backend structure.
It yields the techniques equal to a layered API and backend, which will prepare us for a next workshop on that.

Poison of choice: **Laravel 5**

The API requires

-	ORM (object based DB storage)
-	Endpoint validation
-	Oauth2 login
-	Mail brokerage
-	Basic testing endpoints

#### Front-end application
The front-end application should be hybrid, with only requiring Model-View logic. Therefore, we opt Ionic2, which allows us to write in html and javascript, t be distributed to iOS, Android and "default" web.

Poison of choice: **Ionic 2**

The App requires

-	Cors API connection
-	Model-View logic
-	Payment service inegration

#### Admin board
No fully qualified application environment without a admin board. Based on the Oauth2 authentication, admins and providers can log in to review their orders, backlog and statistics.

Poison of choice: **Backbone**

The Admin board requires

-	Role based views
-	Cors API connection
-	Model-View logic



## To-do

-	Present the **3-Layer** architecture
-	Explore the 3 repositories
-	Set up **DigitalOcean** server
-	Connect the deploy-service **Deploybot** with the git repos
-	Create teams and **teamleaders**
-	Get **hacking**

## Online sources

- API: [broodjesapi.tuihackfridays.com](http://broodjesapi.tuihackfridays.com)