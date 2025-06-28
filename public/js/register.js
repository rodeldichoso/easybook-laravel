// load the dom
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("registerForm");
    const message = document.getElementById("message");

    if (!form) return;

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const token = document.querySelector('meta[name="csrf-token"]').content;

        const payload = {
            first_name: document.getElementById("first-name").value,
            last_name: document.getElementById("last-name").value,
            email: document.getElementById("email").value,
            password: document.getElementById("password").value,
            password_confirmation: document.getElementById(
                "password_confirmation"
            ).value,
        };

        try {
            const response = await fetch("/create-user", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token,
                    Accept: "application/json",
                },
                body: JSON.stringify(payload),
            });

            const result = await response.json();

            if (response.ok) {
                message.textContent = result.message;
                message.style.color = "green";
                setTimeout(() => {
                    window.location.href = "/login";
                }, 1000);
            } else {
                message.textContent = result.message || "Registration failed.";
                message.style.color = "red";
            }
        } catch (error) {
            console.error(error);
            message.textContent = "Something went wrong.";
            message.style.color = "red";
        }
    });
});
