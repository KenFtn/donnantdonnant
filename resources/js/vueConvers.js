axios({
    headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
    },
    method:'post',
    url:'/api/user',
    data: formData
}).then(response => {
    console.log(Object.values(response.data));
})
