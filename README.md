# 📡 GitHub Activity CLI (PHP)

A simple PHP command-line interface to fetch and display recent GitHub activity of any user using the GitHub public API — without using any external libraries or frameworks.

---

## 🌟 Features

- Fetch recent public GitHub activity by username
- Display events like:
  - Pushed commits
  - Opened issues
  - Starred repositories
- Gracefully handles errors (e.g., invalid usernames, no activity found)
- Built using **pure PHP**

---

## 🛠 Requirements

- PHP 7.4 or higher
- Internet connection
- Terminal / Command Line access

---

## 🚀 How to Use

### 📥 Clone the repository

```bash
git clone https://github.com/AadAriess/github-activity-cli-php.git
cd github-activity-cli-php
```

### ▶️ Run the script
```bash
php github-activity.php <github-username>
```

### 📌 Example
```bash
php github-activity.php kamranahmedse
```

### ✅ Output
```bash
Recent activity for kamranahmedse:
Pushed 3 commit(s) to kamranahmedse/developer-roadmap
Opened a new issue in kamranahmedse/developer-roadmap
Starred kamranahmedse/developer-roadmap
```

### 📂 Project Structure
```bash
github-activity-cli-php/
├── github-activity.php      <-- Main CLI script
└── README.md                <-- Project instructions
```

### ❗ Notes
```bash
This CLI only shows public activity.

It uses GitHub's public API: https://api.github.com/users/<username>/events

Make sure to use a valid GitHub username.
```

### 🌐 Project Page
```bash
🔗 Submit or view this project on:
https://roadmap.sh/projects/github-user-activity
```