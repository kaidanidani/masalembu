document.addEventListener("DOMContentLoaded", () => {
  const chatToggle = document.getElementById("chatToggle");
  const chatBox = document.getElementById("chatBox");
  const chatForm = document.getElementById("chatForm");
  const userMessage = document.getElementById("userMessage");
  const chatMessages = document.getElementById("chatMessages");
  const closeChat = document.getElementById("closeChat");
  const fullscreenBtn = document.getElementById("fullscreenBtn");

  // ==== Dragging ====
  let isDragging = false, offsetX, offsetY;

  chatBox.addEventListener("mousedown", (e) => {
    if (e.target.closest("input, textarea, button")) return;
    isDragging = true;
    offsetX = e.clientX - chatBox.getBoundingClientRect().left;
    offsetY = e.clientY - chatBox.getBoundingClientRect().top;
    chatBox.style.position = "fixed";
    chatBox.style.zIndex = "9999";
  });

  document.addEventListener("mousemove", (e) => {
    if (!isDragging) return;
    chatBox.style.left = `${e.clientX - offsetX}px`;
    chatBox.style.top = `${e.clientY - offsetY}px`;
  });

  document.addEventListener("mouseup", () => isDragging = false);

  // ==== Toggle Chat ====
  chatToggle.addEventListener("click", () => chatBox.classList.toggle("d-none"));
  closeChat.addEventListener("click", () => chatBox.classList.add("d-none"));
  fullscreenBtn.addEventListener("click", () => chatBox.classList.toggle("fullscreen-mobile"));

  // ==== Kirim Pesan ====
  chatForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const message = userMessage.value.trim();
    if (!message) return;

    appendMessage("Anda", message);
    userMessage.value = "";

    try {
      const response = await fetch(BASE_URL + "/chat/tanya", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "message=" + encodeURIComponent(message),
      });

      const result = await response.json();
      appendMessage("Bot", result.message || "Bot tidak merespons.");
    } catch {
      appendMessage("Bot", "Terjadi kesalahan koneksi.");
    }
  });

  // ==== Tampilkan Pesan ====
  function appendMessage(sender, message) {
  const msg = document.createElement("div");
  const isBot = sender.toLowerCase().includes("bot");

  msg.classList.add("d-flex", "mb-3", isBot ? "justify-content-start" : "justify-content-end");

  msg.innerHTML = `
    <div class="d-flex ${isBot ? "" : "flex-row-reverse"} align-items-start">
      <div class="me-2 ${isBot ? "" : "ms-2"}">
        <i class="bi ${isBot ? 'bi-robot text-primary' : 'bi-person-circle text-secondary'}" style="font-size: 1.5rem;"></i>
      </div>
      <div class="chat-bubble p-2 rounded ${isBot ? 'bg-light text-dark' : 'bg-primary text-white'}" style="max-width: 75%;">
        ${message}
      </div>
    </div>
  `;

  chatMessages.appendChild(msg);
  chatMessages.scrollTop = chatMessages.scrollHeight;
}


  // ==== Drag Toggle Icon & Chatbox ====
  makeDraggable(chatToggle);
  makeDraggable(chatBox);
});

function makeDraggable(element) {
  let isDragging = false, offsetX, offsetY;

  element.addEventListener("mousedown", (e) => {
    isDragging = true;
    offsetX = e.clientX - element.getBoundingClientRect().left;
    offsetY = e.clientY - element.getBoundingClientRect().top;
    element.style.cursor = "grabbing";
  });

  document.addEventListener("mousemove", (e) => {
    if (!isDragging) return;
    element.style.left = `${e.clientX - offsetX}px`;
    element.style.top = `${e.clientY - offsetY}px`;
    element.style.bottom = "auto";
    element.style.right = "auto";
    element.style.position = "fixed";
  });

  document.addEventListener("mouseup", () => {
    isDragging = false;
    element.style.cursor = "grab";
  });
}
