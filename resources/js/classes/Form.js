import Errors from "./Errors";

class Form {
    constructor(data){
        this.data = data;
        this.errors = new Errors();

        for(let field in data){
            this[field] = data[field];
        }
    }
}

export default Form;
