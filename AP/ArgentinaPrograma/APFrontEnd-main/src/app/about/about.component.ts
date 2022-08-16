import { Component, OnInit } from '@angular/core';
import { User } from '../model/User';
import { UserService } from '../services/user.service';
import { HttpErrorResponse } from '@angular/common/http';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.css']
})
export class AboutComponent implements OnInit {
  public user : User | undefined;

  public editUser : User | undefined;

  constructor(private userService : UserService) { }

  ngOnInit(): void { 
    
    this.getUser();
  }
  public getUser():void{
  this.userService.getUser().subscribe({
    next : (response : User ) => {
      this.user = response;
    }, error:(error:HttpErrorResponse) =>{
      alert(error.message);
    }
    
  })

}
} 