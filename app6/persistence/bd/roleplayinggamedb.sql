CREATE DATABASE IF NOT EXISTS roleplayinggamedb;

USE roleplayinggamedb;

CREATE TABLE IF NOT EXISTS creatures (
	idCreature int not null AUTO_INCREMENT,
	name varchar(255),
	abilities text,
	avatar varchar(255),
	PRIMARY KEY( idCreature )
);


INSERT INTO `creatures` VALUES (1,'Void-Consumed Treants',' Deals Might Damage to an Enemy Stack, decreasing its Melee Might Resistance and rooting it to the spot so that it is unable to escape.
<ul>
<li>Melee Might Damage - 40</li>
<li>Attack Range - 1</li>
<li>Duration - 2 rounds</li>
<li>Cooldown - 4 rounds</li>
<li>Effect: Void Roots</li>
<li>Movement Range - -100%</li>
<li>Melee Might Resistance - 20%</li>
</ul>
.','https://vignette2.wikia.nocookie.net/mightandmagic/images/0/03/Void-consumed_treant.jpg');

INSERT INTO `creatures` VALUES (2,'Army','To make it cost efficient it is best to use basic troops like Archers, Ghouls, etc. However although un-upgraded Elite and Champions are more expensive, it is easier to store them and they contribute more to Battle Power Points.
.','https://vignette2.wikia.nocookie.net/wowwiki/images/a/a1/Ner_zhul_%28the_Lich_King%29.jpg');