import { Component, OnInit } from '@angular/core';
import { User } from 'src/app/model/user.model';
import { UserService } from 'src/app/services/userService/user.service';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.css']
})
export class AboutComponent implements OnInit {
  User: User = new User("","","");

  constructor(public userService: UserService) { }

  ngOnInit(): void {
    this.userService.getUser().subscribe(data => {this.User = data})
  }

}
