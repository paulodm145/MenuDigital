# Projeto Menu Digital  
**Objetivos**  
Criar um menu para o cliente realizar o pedido, a cozinha(comida japonesa) recebe o pedido 
que será feito no salão do restaurante e o aceita. após concluir o pedido a equipe da cozinha 
chama o cliente cjo numero do pedido aparece no display do restaurante.    

**Este projeto inclui**:    
* **CRUD** - Faz as operações básicas: CREATE, READ, UPDATE e DELETE;  
* Utiliza as funções de Object Relation Map do Laravel(Eloquent);
* Faz miniatura de imagens com a Biblioteca [Intervention Image](http://image.intervention.io/) ;    
* Possui as telas de: Dashboard, Cadastro de Produtos, Menu Cliente e Menu Cozinha;      

# Recursos Adicionais      
**Recursos que serão adicionados:**      
*Comunicação em Tempo Real com socket io ou outra biblioteca que torne o projeto viável;      
*fazer chamada de pedidos concluídos por voz;  

# Lista de Tarefas  
- [x] **Cadastro de Produtos:** Adicionar, Atualizar, remover produtos;   
- [x] **Criação de thumnails e manipulação de imagens:** Implementar Manipulação de Imagens com a classe Intervention;  
- [] **Novo Pedido:** Implementar interface para o cliente fazer o pedido e enviar o mesmo a cozinha. Ações: Abrir Novo Pedido, Selecionar Pedidos, Concluir o pedido e emitir cupom para o Cliente;  
- [] **Cozinha:** Implementar interface para a montagem dos pratos. Ações: Receber Novo Pedido, Concluir Pedido, Disparar alerta de **PRONTO**;  
- [] **DISPLAY DE INTEGRA** Implementar display de entrega. Ações: Exibir o Número do Pedido concluído. Mostrar na Lateral quais pedidos foram entregues;    

