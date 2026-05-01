# 🚀 Acessera – Smart Learning Platform

<p align="center">
  <img src="https://readme-typing-svg.herokuapp.com?color=F7A41D&center=true&vCenter=true&width=500&lines=Welcome+to+Acessera!;AI+Driven+Learning+Platform;Admin+Approval+System;Built+with+PHP+%26+MySQL" />
</p>

---

## 🌟 Project Overview

**Acessera** is a smart EdTech platform where:

👨‍🎓 Users request courses  
🛒 Requests are stored in database  
👨‍💻 Admin approves/rejects requests  
🎓 Access is granted after approval  

---

## 🎯 Features

✨ User Authentication (Login/Signup)  
✨ Course Request System  
✨ Admin Dashboard  
✨ Accept / Reject Requests  
✨ Course Access Control  
✨ Certificate Ready Logic  
✨ Live Search (JavaScript)  

---

## 🔄 Workflow

```mermaid
graph TD
A[User Login] --> B[Select Course]
B --> C[Send Request]
C --> D[Stored in Database]
D --> E[Admin Dashboard]
E --> F{Decision}
F -->|Accept| G[Course Access + Certificate]
F -->|Reject| H[Access Denied]
