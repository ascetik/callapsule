# Schema du machin

## interface CallableType

Décrit le comportement d'un objet qui encapsule une fonction, une méthode ou une instance invokable.

On appelle action le fait d'exécuter la fonction/methode associée en passant un iterable en parametre.

1.
On doit être capable d'éxecuter l'action.
On doit pouvoir retourner notre action telle quelle (pour injection de dépendance)

2.
On devrait être capable de connaitre le type de retour s'il y est ou null.
ça peut être un truc de trois types : named, union et intersection.

3.
on devrait être capable de récupérer les paramètres et leur type.

Pourrait-on y affecter un nom ou un id ???

### ClosureCall

C'est le plus simple. Il encapsule une Closure et point barre.

Il peut l'exécuter ou la retourner, comme l'exige l'interface

### MethodCall

Celle là ne reçoit qu'une instance avec sa méthode.
L'instance est à conserver avec tous ses parametres lors de la serialization pour avoir une méthode qui fonctionne avec les bons paramètres.

Comme l'interface le dit, elle peut retourner son callable ou l'executer.

### InvokableCall

Celui-ci encapsule une instance qui doit implementer la méthode __invoke().

Et hop, interface inside, sortie de l'instance et execution.

### StaticCall

Histoire de bien différencier tout ça, j'ajoute un truc genre MethodCall mais en statique.
ça permet d'avoir une class-string en parametre et la methode qui va bien.

## Methodes nécessaires

On va avoir, déjà d'emblée :
- apply(iterable $parameters = []): mixed
- action(): callable

la premiere retourne mixed parce qu'on ne sait pas forcément ce que la fonction retourne.
la deuxieme reourne callable parce que nos implementations retournent bien un callable finalement.

## Et pour les extensions

On se fera un outil qui utilisera ces machins pour lire leur callable et nous faire un truc propre.
On se contente de faire une base qu'on pourra wrapper dans des trucs plus cool au besoin.
