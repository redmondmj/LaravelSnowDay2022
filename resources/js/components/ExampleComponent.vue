<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body" id=message>
                        I'm an example component and my message is: {{ message }}
                        <input type="text" class="form-control" name="message" id="message" aria-describedby="helpId"
                                v-model="message">
                        <small id="helpId" class="form-text text-muted">Notice the v-bind magic ^^</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                message: 'Hello World!'
            }
        },
        mounted() {
            console.log('Component mounted.')
            console.log(this.message)
        }
    }
</script>
