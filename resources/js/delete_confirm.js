const forms = document.querySelectorAll(".delete-form");

forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
        const hasConfirmed = confirm("Are you sure to delete this post?");
        e.preventDefault();
        if (hasConfirmed) form.submit();
    });
});
