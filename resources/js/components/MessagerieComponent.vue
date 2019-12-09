<template>
    <div class='row m-5'>
        <div class='col-md-3'>
            <div class ="list-group">
                    
                <a class='list-group-item d-flex justify-content-between align-items-center'> 
                    Test {{ user }}
                    <span class="badge badge-pill badge-primary">0</span>
                </a>    
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: Number
    }
}
</script>