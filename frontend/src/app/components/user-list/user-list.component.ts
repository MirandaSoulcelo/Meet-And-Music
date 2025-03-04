import { Component, OnInit } from '@angular/core';
import { UserService } from '../../../service/user.service';
import { CommonModule } from '@angular/common'; // Importação do CommonModule

@Component({
  selector: 'app-user-list',
  standalone: true, // Tornando o componente standalone
  imports: [CommonModule], // Adiciona CommonModule aqui
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css']
})
export class UserListComponent implements OnInit {
  users: any[] = []; // Array para armazenar os usuários

  constructor(private userService: UserService) {}

  ngOnInit(): void {
    this.fetchUsers();
  }

  // Buscar usuários da API
  fetchUsers() {
    this.userService.getUsers().subscribe(
      (data) => {
        this.users = data;
      },
      (error) => {
        console.error('Erro ao buscar usuários', error);
      }
    );
  }
}
