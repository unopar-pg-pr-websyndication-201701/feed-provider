# feed-provider

# Tecnologias
	Laravel
	sqlite3
# Premissas
	Feed deve ser disponibilizado em RSS e Atom
	Verificar a evolução semanalmente
	Layout padrão bootstrap
# Restrições
	05/05/2017 prazo limite de entrega

# Goals
	Cadastro de Notícias
		Padrão Noticias
		tempo noticia ar
		campos do cadastro:
			autor
			foto
			titulo
			descrição
			url
			conteudo
			categoria
	Cadastro de Categorias
			nome
	Geração de Feed
		Ordenar por data
		ultimos pm.			
	Página de Notícias
		restringir nº de noticias exibidas com base no tempo
		ordenadas por data decrescente
	Área Administrativa
	Sistema de Login
		somente 1 usuario fixo
			user: admin
			pass: 123
