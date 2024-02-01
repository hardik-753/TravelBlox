const express = require("express");
const http = require("http");
const socketIo = require("socket.io");
const path = require("path");
// const cors = require('cors');

const app = express();
const server = http.createServer(app);

// const io = socketIo(server);

const io = socketIo(server, {
  cors: {
    origin: "*", 
    methods: ["GET", "POST"],
  }
});

// Serve static files from the "MyGroup" directory
app.use(express.static(path.join(__dirname, "MyGroup")));

app.get("/", (req, res) => {
  // This route serves the 'index.html' file from the "MyGroup" directory
  res.sendFile(path.join(__dirname, "MyGroup", "index.html"));
});


const users = {};

// After Accept Connection...

io.on("connection", (socket) => {

  console.log("A user connected");

  socket.on("new-user-joined", (username) => {
    users[socket.id] = username;
    socket.broadcast.emit("user-joined", username);
  });

  socket.on("send", (message) => {
    socket.broadcast.emit("receive", {
      message: message,
      username: users[socket.id],
    });
  });

  socket.on('disconnect', (message) => {
    socket.broadcast.emit("left", users[socket.id]);
    delete users[socket.id];
  });

});

server.listen(3000, () => {
  console.log("Server is running on http://localhost:3000");
});
