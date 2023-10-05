import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';
import { SigninComponent } from '../signin/signin.component';
import { MatDialog } from '@angular/material/dialog';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  User: any = ['Super Admin', 'Author', 'Reader'];
  constructor(private matDialogRef: MatDialogRef<RegisterComponent>, public dialog: MatDialog) { }

 

  openDialog() : void {

    this.dialog.open(SigninComponent, {})
  }

  ngOnInit(): void {
  }

  register() {
    /* on succes */
    this.matDialogRef.close({ success: true })
  }

}
