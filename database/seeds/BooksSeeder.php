<?php

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert(
        	[
        		'name' => 'The Night Fire',
        		'description' => "Harry Bosch and LAPD Detective Renée Ballard come together again on the murder case that obsessed Bosch's mentor, the man who trained him---new from #1 New York Times bestselling author Michael Connelly. Back when Harry Bosch was just a rookie homicide detective, he had an inspiring mentor who taught him to take the work personally and light the fire of relentlessness for every case. Now that mentor, John Jack Thompson, is dead, but after his funeral his widow gives Bosch a murder book that Thompson took with him when he left the LAPD 20 years before -- the unsolved killing of a troubled young man in an alley used for drug deals.Bosch brings the murder book to Renée Ballard and asks her to help him find what about the case lit Thompson's fire all those years ago. That will be their starting point.The bond between Bosch and Ballard tightens as they become a formidable investigative team. And they soon arrive at a worrying question: Did Thompson steal the murder book to work the case in retirement, or to make sure it never got solved?",
        		'author_id' => '1'
        	]
        );
 
        DB::table('books')->insert(
        	[
        		'name' => 'The Lives of Animals', 
        		'description' => "The idea of human cruelty to animals so consumes novelist Elizabeth Costello in her later years that she can no longer look another person in the eye: humans, especially meat-eating ones, seem to her to be conspirators in a crime of stupefying magnitude taking place on farms and in slaughterhouses, factories, and laboratories across the world.<p>Costello's son, a physics professor, admires her literary achievements, but dreads his mother's lecturing on animal rights at the college where he teaches. His colleagues resist her argument that human reason is overrated and that the inability to reason does not diminish the value of life; his wife denounces his mother's vegetarianism as a form of moral superiority.</p>At the dinner that follows her first lecture, the guests confront Costello with a range of sympathetic and skeptical reactions to issues of animal rights, touching on broad philosophical, anthropological, and religious perspectives. Painfully for her son, Elizabeth Costello seems offensive and flaky, but--dare he admit it?--strangely on target.", 
        		'author_id' => '2'
        	]
        );

        DB::table('books')->insert(
        	[
        		'name' => 'Tyll', 
        		'description' => "From the internationally best-selling author of You Should Have Left, Measuring the World, and F, a transfixing retelling of the German myth of Tyll Ulenspiegel: a story about the devastation of war and a beguiling artist's decision never to die. Daniel Kehlmann masterfully weaves the fates of many historical figures into this enchanting work of magical realism and adventure. This account of the seventeenth-century vagabond performer and trickster Tyll Ulenspiegel begins when he's a scrawny boy growing up in a quiet village. When his father, a miller with a secret interest in alchemy and magic, is found out by the church, Tyll is forced to flee with the baker's daughter, Nele. They find safety and companionship with a traveling performer, who teaches Tyll his trade. And so begins a journey of discovery and performance for Tyll, as he travels through a continent devastated by the Thirty Years' War and encounters along the way a hangman, a fraudulent Jesuit scholar, and the exiled King Frederick and Queen Elizabeth of Bohemia.", 
        		'author_id' => '6'
        	]
        );
        
        DB::table('books')->insert(
        	[
        		'name' => 'Dark Sacred Night', 
        		'description' => "LAPD Detective Renee Ballard teams up with Harry Bosch in the new thriller from #1 NYT bestselling author Michael Connelly.Renee Ballard is working the night beat again, and returns to Hollywood Station in the early hours only to find a stranger rifling through old file cabinets. The intruder is retired detective Harry Bosch, working a cold case that has gotten under his skin. Ballard kicks him out, but then checks into the case herself and it brings a deep tug of empathy and anger. Bosch is investigating the death of fifteen-year-old Daisy Clayton, a runaway on the streets of Hollywood who was brutally murdered and her body left in a dumpster like so much trash. Now, Ballard joins forces with Bosch to find out what happened to Daisy and finally bring her killer to justice.", 
        		'author_id' => '1'
        	]
        );
        DB::table('books')->insert(
        	[
        		'name' => 'Breath: The New Science of a Lost Art', 
        		'description' => "No matter what you eat, how much you exercise, how skinny or young or wise you are, none of it matters if you're not breathing properly. There is nothing more essential to our health and well-being than breathing: take air in, let it out, repeat 25,000 times a day. Yet, as a species, humans have lost the ability to breathe correctly, with grave consequences. Journalist James Nestor travels the world to figure out what went wrong and how to fix it. The answers aren't found in pulmonology labs, as we might expect, but in the muddy digs of ancient burial sites, secret Soviet facilities, New Jersey choir schools, and the smoggy streets of São Paulo. Nestor tracks down men and women exploring the hidden science behind ancient breathing practices like Pranayama, Sudarshan Kriya, and Tummo and teams up with pulmonary tinkerers to scientifically test long-held beliefs about how we breathe.", 
        		'author_id' => '3'
        	]
        );
        DB::table('books')->insert(
        	[
        		'name' => 'The Book of Eels: Our Enduring Fascination with the Most Mysterious Creature in the Natural World', 
        		'description' => "Part H Is for Hawk, part The Soul of an Octopus, The Book of Eels is both a meditation on the world's most elusive fish--the eel--and a reflection on the human condition. Remarkably little is known about the European eel, Anguilla anguilla. So little, in fact, that scientists and philosophers have, for centuries, been obsessed with what has become known as the 'eel question' Where do eels come from? What are they? Are they fish or some other kind of creature altogether? Even today, in an age of advanced science, no one has ever seen eels mating or giving birth, and we still don't understand what drives them, after living for decades in freshwater, to swim great distances back to the ocean at the end of their lives. They remain a mystery. Drawing on a breadth of research about eels in literature, history, and modern marine biology, as well as his own experience fishing for eels with his father, Patrik Svensson crafts a mesmerizing portrait of an unusual, utterly misunderstood, and completely captivating animal. In The Book of Eels, we meet renowned historical thinkers, from Aristotle to Sigmund Freud to Rachel Carson, for whom the eel was a singular obsession. And we meet the scientists who spearheaded the search for the eel's point of origin, including Danish marine biologist Johannes Schmidt, who led research efforts in the early twentieth century, catching thousands upon thousands of eels, in the hopes of proving their birthing grounds in the Sargasso Sea.", 
        		'author_id' => '4'
        	]
        );
        DB::table('books')->insert(
        	[
        		'name' => 'Winter Counts', 
        		'description' => "An addictive and groundbreaking debut thriller set on a Native American reservation and hailed by CJ Box as 'a hell of a debut'. Winter Counts is both a propulsive crime novel and a wonderfully informative book.' --Louise Erdrich. Virgil Wounded Horse is the local enforcer on the Rosebud Indian Reservation in South Dakota. When justice is denied by the American legal system or the tribal council, Virgil is hired to deliver his own punishment, the kind that's hard to forget. But when heroin makes its way into the reservation and finds Virgil's own nephew, his vigilantism suddenly becomes personal. He enlists the help of his ex-girlfriend and sets out to learn where the drugs are coming from, and how to make them stop. They follow a lead to Denver and find that drug cartels are rapidly expanding and forming new and terrifying alliances. And back on the reservation, a new tribal council initiative raises uncomfortable questions about money and power. As Virgil starts to link the pieces together, he must face his own demons and reclaim his Native identity. He realizes that</p>", 
        		'author_id' => '5'
        	]
        );

       DB::table('books')->insert(
        	[
        		'name' => 'Fair Warning', 
        		'description' => "The hero of The Poet and The Scarecrow is back in the new thriller from #1 New York Times bestselling author Michael Connelly. Jack McEvoy, the journalist who never backs down, tracks a serial killer who has been operating completely under the radar--until now. Veteran reporter Jack McEvoy has taken down killers before, but when a woman he had a one-night stand with is murdered in a particularly brutal way, McEvoy realizes he might be facing a criminal mind unlike any he's ever encountered. Jack investigates--against the warnings of the police and his own editor--and makes a shocking discovery that connects the crime to other mysterious deaths across the country. Undetected by law enforcement, a vicious killer has been hunting women, using genetic data to select and stalk his targets. Uncovering the murkiest corners of the dark web, Jack races to find and protect the last source who can lead him to his quarry. But the killer has already chosen his next target, and he's ready to strike. Terrifying and unputdownable, Fair Warning shows once again why 'Michael Connelly has earned his place in the pantheon of great crime fiction writers' (Chicago Sun-Times).", 
        		'author_id' => '1'
        	]
        );

        DB::table('books')->insert(
        	[
        		'name' => 'Get High Now Without Drugs', 
        		'description' => "Get High Now is an illustrated, mind-blowing magic carpet ride of more than 175 ways to alter human perception and consciousnesswithout drugs or alcohol. Culled from science, physiology, spiritual practices, and the audio visual arts, these 'all natural' highs playfully and safely explore the mind-body connection to entertaining and illuminating effect. Accessible and well-researched, each entry introduces concepts such as lucid dreaming, optical and auditory illusions, controlled breathing, meditation, time compression, and physical and mental exercises, explaining the ways in which they affect our minds and bodies and how to do them. Readers follow the author and his 'HighLab' testing team through mind-bending and sometimes hilarious investigations, such as how to lull the mind into hallucinatory states with audio loops; why multiple bee stings lead to euphoric states; what cheeses to eat to induce psychedelic lucid dreams; how to control your breathing to create an out-of-body experience; and many more. Including solo, tandem, and group highs, Get High Now features hundreds of ways to calm or stimulate the senses and open new windows to experiencing the world.", 
        		'author_id' => '3'
        	]
        );
        DB::table('books')->insert(
        	[
        		'name' => 'Down These Green Streets: Irish Crime Writing in the 21st Century', 
        		'description' => "The contributors list includes a number of distinguished and internationally renowned crime writers, such as John Connolly, Tana French, John Banville and Alex Barclay, featuring rare and unpublished pieces. Is crime fiction now the most relevant and valid form of writing to deal with Modern Ireland in terms of the post-'Troubles' landscape and the post-Celtic Tiger economic boom? As the first book written on this topic, Down These Green Streets is both detailed and diverse, with each chapter providing a new author's approach and discussing a different aspect of Irish Crime Writing. For example, Declan Hughes focuses on the influence of American culture on Irish crime writing, while Tana French reflects on crime fiction and the post-Celtic Tiger Irish identity. Down These Green Streets is for both the academic and the general reader.", 
        		'author_id' => '1'
        	]
        );
        DB::table('books')->insert(
        	[
        		'name' => 'The Schooldays of Jesus', 
        		'description' => "LONGLISTED FOR THE MAN BOOKER PRIZE. A NEW YORK MAGAZINE BEST BOOK OF THE YEAR. From the Nobel Prize-winning author J. M. Coetzee, the haunting sequel to The Childhood of Jesus, continuing the journey of Davíd, Simón, and Inés. The Death of Jesus is forthcoming from Viking. 'When you travel across the ocean on a boat, all your memories are washed away and you start a completely new life. That is how it is. There is no before. There is no history. The boat docks at the harbour and we climb down the gangplank and we are plunged into the here and now. Time begins.' Davíd is the small boy who is always asking questions. Simón and Inés take care of him in their new town, Estrella. He is learning the language; he has begun to make friends. He has the big dog Bolívar to watch over him. But he'll be seven soon and he should be at school. And so, with the guidance of the three sisters who own the farm where Simón and Inés work, Davíd is enrolled in the Academy of Dance. It's here, in his new golden dancing slippers, that he learns how to call down the numbers from the sky. But it's here, too, that he will make troubling discoveries about what grown-ups are capable of. In this mesmerizing allegorical tale, Coetzee deftly grapples with the big questions of growing up, of what it means to be a 'parent', the constant battle between intellect and emotion, and how we choose to live our lives.", 
        		'author_id' => '2'
        	]
        );

    }
}
