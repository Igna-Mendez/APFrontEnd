import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { User } from 'src/app/model/user.model';

@Injectable({
  providedIn: 'root'
})
export class UserService {
 URL = "http://localhost:8080/User/";
  constructor(private http: HttpClient) { }
  
  public getUser(): Observable<User>{
  return this.http.get<User>(this.URL+'/id/{id}');
  }
}
