export class User{
    id: number;
    name: string;
    lastName: string;
    title: string;
    about: string;
    imgperf: string;

    constructor(name: string, lastName: string, imgperf: string,){
        this.name = name;
        this.lastName = lastName;
        this.imgperf = imgperf;
    }
}