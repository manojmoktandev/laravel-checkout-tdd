
## About Task

This is Simple Test Driven Development task for product checkout.
Task are  given below
Product Code  |  Name           | Price
------------- | --------------  | -----
FR1           |  Fruit tea      | $3.11
SR1           |  Strawberries   | $3.50
CF1           |  Coffe          | $1.89

Store is giving  offer buy one get one free for fruit tea.
Store giving low  prices and  wants people buying strawberries to get a price discount for bulk purhase. if customer purchase  3 or more strawberries the price drop  to $2.00.
Checkout can scan items in any order and because  and store owner changes thier minds often , it nees to flexible regarding our pricing rules.

Implement a checkout system that fulfills above requirement

Test Data
---------------------------------

**Cart:FR1,SR1,FR1,FR1,CF1**
<br>
**Total Price Expected: $11.61**

**Cart:FR1,FR1**
<br>
**Total Price Expected:$3.11**

**Cart: SR1,SR1,FR1,SR1**
<br>
**Total Price Expected:$5.11**



