# VueLaravel-WebSocket-Chat
This project is a real-time chat room application that utilizes the power of Laravel for backend development, Vue.js and Inertia.js for frontend development, and a PHP WebSocket package for enabling interactive and real-time communication between clients and the server over a single, long-lived connection.

# Features
- Create and manage different chat rooms.
- Send and receive messages in real-time within chat rooms.
- Seamless navigation and reduced page reload using Vue.js and Inertia.js.
- Utilizes Laravel version 9 for backend operations.
- WebSocket integration for instant communication.
- Easy management of WebSocket events and channels.
# Technologies Used
- Laravel 9
- Vue.js
- Inertia.js
- PHP WebSocket Package (e.g., Ratchet)
- Webpack for view rendering
# Getting Started
- Clone the repository to your local machine.
- Navigate to the project directory.
# Setting up Backend (Laravel)
- Install Laravel dependencies: composer install
- Set up the database and run migrations: php artisan migrate
- Start the Laravel WebSocket server: php artisan websockets:serve (Accessible at http://localhost:6001)
- Access WebSocket events and channels management at the Laravel WebSockets route.
# Setting up Frontend
-Install JavaScript dependencies: npm install
- Compile assets for development: npm run dev
- Start the development server: npm run watch
# Usage
- Open your browser and navigate to the application URL.
- Create or select a chat room.
- Start sending and receiving real-time messages with other users in the same chat room.
# Contributing
Contributions are welcome! If you'd like to contribute to this project, please follow these steps:

- Fork the repository.
- Create a new branch: git checkout -b feature/your-feature-name
- Make your changes and commit them: git commit -m 'Add some feature'
- Push to the branch: git push origin feature/your-feature-name
- Open a pull request.
