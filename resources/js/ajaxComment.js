const formComment = document.querySelectorAll('.formComment');
formComment.forEach(form => {
    form.addEventListener('submit', function(e){
        e.preventDefault();
        const formData = new FormData(this);
        axios({
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
            },
            method:'post',
            url:'/comment/store',
            data: formData
        }).then(response => {
            console.log(Object.values(response.data));
        })})})