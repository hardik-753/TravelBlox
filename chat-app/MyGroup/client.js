const socket = io('http://localhost:3000');


const form = document.getElementById("send-container");
const messageInput = document.getElementById("messageinp");
const messageContainer = document.querySelector(".container");

const append = (message, position) => {
  const messageElement = document.createElement("div");
  messageElement.innerText = message;
  messageElement.classList.add("message");
  messageElement.classList.add(position);
  messageContainer.append(messageElement);
};

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const message = messageInput.value;
  append(`You: ${message}`, "right");
  socket.emit("send", message);
  messageInput.value = "";
});

const username = prompt("Enter Your Name To Join..!");
socket.emit("new-user-joined", username);

socket.on("user-joined", (data) => {
  append(`${data} joined the chat`, "center");
});

socket.on("receive", (data) => {
  append(`${data.username}: ${data.message} `, "left");
});

socket.on("left", (data) => {
  append(`${data} left the chat`, "center");

});

