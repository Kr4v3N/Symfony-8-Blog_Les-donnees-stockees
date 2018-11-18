# Symfony-8-Blog_Les-donnees-stockees

Challenge:

FindBy() : récupérer plusieurs objets avec des filtres
Tu as utilisé pour le moment les méthodes findAll() et findOneBy(). 
Il est temps pour toi de mettre en pratique la méthode findBy(). 
Le principe reste identique à la méthode findOneBy(), mais au lieu de récupérer strictement un seul tuple, 
tu en récupères plusieurs liés à une catégorie donnée. 
De plus n’oublie pas, tu peux ajouter d’autres paramètres à cette méthode, très utile pour trier ou limiter tes résultats.

Crée une nouvelle méthode dans la classe BlogController nommée showByCategory(string $category), prenant en paramètre 
une catégorie de type string, 
puis utilise la méthode findOneByName(\$category) sur le repository Category::class afin de récupérer 
l'objet Category correspondant.
Ensuite, dans la même méthode, tu devra fetcher tous les articles liés à la catégorie récupérée 
(tu utiliseras cette fois ci l'ArticleRepository), 
dans la limite de 3 (tu peux en rajouter en CLI comme au début de la quête) et triées par id d'article décroissant.

Crée une nouvelle vue templates/blog/category.html.twig 
qui affichera tous les articles avec leurs id, titres et contenus (dans ta correction tu es déjà passé par 
les ParamConverter en fait, mais là il faut faire l'étape à la main ).

Critéres de validation
Une nouvelle méthode showByCategory(string $category) a été créée dans le controller BlogController.
La route de cette méthode sera sous la forme : @Route("/category/{category}", name="blog_show_category").
Cette méthode retourne un tableau d'articles récupéré par la méthode findBy(), en limitant le nombre de résultats à 3, 
le tout trié par id décroissant.
Un nouveau fichier a été créé templates/blog/category.html.twig.
Ce fichier bouclera sur tous les articles afin d'afficher l'id, le titre et le contenu de chaque itération.
L'URL http://localhost:8000/blog/category/javascript est fonctionnelle et 
renvoie bien tous les articles liés à la catégorie Javascript, ajoutée en début de quête.
