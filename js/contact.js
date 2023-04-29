Vue.use(window.vuelidate.default);
const {required, email} = window.validators;
var app = new Vue({
    el:'#app',
    data:{
        confirm:false,
        fname:'',
        lname:'',
        email:'',
        comments:''       
    },
    validations:{
        fname:{
            required
        },
        lname:{
            required
        },
        email:{
            required,
            email
        },
        comments:{
            required
        }
    }
})