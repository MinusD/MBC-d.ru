<div class="h-full overflow-auto transition-all" id="journal-scroll" x-data="{font: 1, theme: 1}">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>


    <div
        class="flex transition duration-500 flex-wrap justify-center bg-gradient-to-br from-indigo-900 to-green-900  min-h-screen "
        :class="{'font-sans': font == 1, 'font-serif': font == 2, 'font-mono': font == 3,
         'bg-gradient-to-br from-indigo-900 to-green-900': theme == 1,
         'bg-gray-50': theme == 2,  'bg-gray-900': theme == 3
         }"
    >
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-6 w-full transition duration-500 ">
            <div
                class="w-full shadow-lg bg-indigo-900 bg-opacity-40 items-center h-32 md:h-16 rounded-2xl z-40 ring-2 ring-offset-blue-800 ring-cyan-700">
                <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
                    <div class="flex justify-between items-center">
                        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-1 w-full ">
                            <div class="py-2  md:px-6 md:py-6 text-white col-span-2">
                                <div class="flex flex-nowrap gap-x-1 justify-center ">
                                    <div
                                        class="font-sans group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-3 py-2 rounded-l-lg ring-2 ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition"
                                        :class="{'bg-gradient-to-br from-yellow-700 to-yellow-600': font == 1}"
                                        @click="font = 1">
                                        <div>
                                            <span>Font-sans</span>
                                        </div>
                                    </div>
                                    <div
                                        class="font-serif group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-3 py-2  ring-2  ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition"
                                        :class="{'bg-gradient-to-br from-yellow-700 to-yellow-600': font == 2}"
                                        @click="font = 2">
                                        <div>
                                            <span>Font-serif</span>
                                        </div>
                                    </div>
                                    <div
                                        class="font-mono group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-3 py-2 rounded-r-lg ring-2  ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition"
                                        :class="{'bg-gradient-to-br from-yellow-700 to-yellow-600': font == 3}"
                                        @click="font = 3">
                                        <div>
                                            <span>Font-mono</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 md:px-6 md:py-6 text-white col-span-2">
                                <div class="flex flex-nowrap gap-x-1 justify-center">
                                    <div
                                        class=" group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-3 py-2 rounded-l-lg ring-2 ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition"
                                        :class="{'bg-gradient-to-br from-yellow-700 to-yellow-600': theme == 1}"
                                        @click="theme = 1">
                                        <div>
                                            <span>Градиент</span>
                                        </div>
                                    </div>
                                    <div
                                        class=" group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-3 py-2  ring-2  ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition"
                                        :class="{'bg-gradient-to-br from-yellow-700 to-yellow-600': theme == 2}"
                                        @click="theme = 2">
                                        <div>
                                            <span>ЧБ</span>
                                        </div>
                                    </div>
                                    <div
                                        class=" group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-3 py-2 rounded-r-lg ring-2  ring-cyan-700 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition"
                                        :class="{'bg-gradient-to-br from-yellow-700 to-yellow-600': theme == 3}"
                                        @click="theme = 3">
                                        <div>
                                            <span>БЧ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="px-6 py-6">--}}
                            {{--                                <a href="http://maybecompany.ru/login" class="text-white">--}}
                            {{--                                    <div class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-3 py-2 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700  cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">--}}
                            {{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                            {{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>--}}
                            {{--                                        </svg>--}}
                            {{--                                        <div>--}}
                            {{--                                            <span>Войти</span>--}}

                            {{--                                        </div>--}}
                            {{--                                        <div>--}}
                            {{--                                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 1 A
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Higher Education in Russia
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russia’s higher education system started with
                        the
                        foundation of the universities in Moscow and St.
                        Petersburg in the middle of the 18th century. The system was constructed similar to that of
                        Germany.
                        In Soviet times all of the population in Russia had at least a secondary education. The pursuit
                        of
                        higher education was and still is considered to be very prestigious. More than 50% of people
                        have a
                        higher education.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russians have always shown a great concern for
                        education. The right to education is stated in the
                        Constitution of the Russian Federation. It’s ensured by compulsory secondary schools, vocational
                        schools and higher education establishments. It is also ensured by the development of extramural
                        and
                        evening courses and the system of state scholarships and grants. Education in Russia is
                        compulsory
                        up to the 9th form inclusive. If a pupil of secondary school wishes to go on with education, he
                        or
                        she must stay at school for two more years.</p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Primary and secondary schools together comprise
                        11 years of study. Every school has a “core
                        curriculum” of academic subjects. After finishing the 9th form one can go on to a vocational
                        school which offers programmes of academic subjects and a programme of training in a technical
                        field, or a profession. After finishing the 11th form of a secondary school, a lyceum or a
                        gymnasium, one can go into higher education. All applicants must take competitive exams. Higher
                        education institutions, that is institutes or universities, offer a 5-years’ programme of
                        academic subjects for undergraduates in a variety of fields.
                    </p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Due to great demands of the international
                        educational organizations, the system of education in Russia began to change over the past
                        years. Universities began transitioning to a system similar to that of Britain and the USA: 4
                        years for the Bachelor’s degree (the first university level degree which is equivalent to the
                        B.Sc. degree in the US or Western Europe) and 2 years for a Master’s degree (postgraduate higher
                        education which is equivalent to a Master’s Degree (M.Sc, M.A.)) in the US or Western Europe.
                        The Bachelor’s degree programmes last for at least 4 years of full-time university-level study.
                    </p>
                    <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The programmes are elaborated in accordance with
                        the State Educational Standards which regulate almost 80% of their content. The other 20% are
                        elaborated by the university itself. The programmes include professional and special courses in
                        Science, the Humanities and Social-economic disciplines, professional training, completion of a
                        research paper/project and passing of State final exams. Having obtained the Bachelor’s degree,
                        students may apply to enter the Master’s programme or continue their studies in the framework of
                        the Specialist Diploma programmes. The Bachelor’s degree is awarded after defending a Diploma
                        project prepared under the guidance of a supervisor and passing the final exams. Holders of the
                        Bachelor’s degree are admitted to enter the Specialist Diploma and Master’s degree programmes.
                        Access to these programmes is competitive. The Master’s degree is awarded after successful
                        completion of two-years’ full-time study. Students must carry out a one-year research including
                        practice and prepare and defend a thesis which constitutes an original contribution and sit for
                        final examinations. Nowadays, as the system of higher education in Russia is going through a
                        transitional period, the universities are still in the process of these changes; some of them
                        offer the new system of education while others still work according to the prior 5-year system.
                    </p>

                </div>
            </div>
        </section>
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 1 B
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    The 300th Anniversary of Technical Education in Russia
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Engineering education in Russia started with
                        organization in Moscow of School for Mathematical and Navigational Crafts. The date of the
                        School foundation should be fixed by the Highest Decree of Emperor Peter the First on January
                        14th, 1701 (old style) or January 27th (by the new style). In fact, the School started a few
                        months earlier and was housed in Kadashevskaya Sloboda.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From the very beginning one of the teachers was
                        Andrei Danilovich (Henry) Farwhurson, a well-known mathematician and astronomer, professor of
                        the Aberdeen University (Scotland). Farwhurson stayed in Russia for the rest of his life and
                        mastered the Russian language. In this language he wrote books on mathematics, geodesy,
                        cartography, astronomy. He may be lawfully named as the first Russian professor of mathematics.
                        Five months later, in June of 1701 the School was relocated into the building of the Sukharev
                        Tower where classrooms and an observatory had been specially set up</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Soon among the teachers appeared Leonti
                        Magnitzky, son of a peasant from Tver Gubernia, who had himself mastered reading and writing and
                        later graduated from the Slavonic-Greek-and-Latin Academy. In 1703 Magnitzky wrote the famous
                        textbook on “Arithmetics” which covered arithmetic, application of arithmetic and algebra to
                        geometry and trigonometric calculations and tables. The third part of the textbook contained
                        information on sea astronomy, geodesy and navigation. The textbook was in wide use for over 50
                        years and all Russian sea officers of the epoch were studying with it.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It is known that mathematics, and later physics,
                        were taught at the Slavonic-Greek-and-Latin Academy founded in 1687 in Zaikonnospassky
                        Monastery, situated in Moscow on Nikolskaya Street. The first institution of higher learning in
                        Russia, Kiev Seminary, dates back to the early XVII century. The entire student body of the
                        School was planned to contain 500 people but at certain periods the number reached 700. Children
                        of all social levels were allowed to be enrolled, with the exception of serfs. The study
                        programme went through 3 stages: primary school taught reading, writing and some grammar,
                        secondary classes taught arithmetic, geometry and trigonometry, and the higher (specialized)
                        classes taught geography, astronomy, navigation and other subjects. The School thus comprised
                        elements of both secondary and higher education. Navigators practised their craft on sea ships.
                        As a means of cultural cultivation, the School had its own theatre where a group of actors
                        invited from Danzig staged and performed plays with students.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The School did not have a fixed term of study.
                        Some students managed to finish the programme in 4 years, while for some it took 13. There were
                        no end-of-the-year exams and students moved from class to class according to their personal
                        performance. The age of the students varied from 15 to 33. The students were stimulated by money
                        allowances. The most affluent or talented were sent to internships abroad. Upon their arrival
                        back home they were subjected to strict examination, sometimes by Peter the Great himself. As
                        early as 1715 the School had trained about 1200 specialists. Its graduates put up an honorable
                        performance in the sea battle of Gangut (1714) where the Russian fleet won its first victory,
                        and were part of the Bering expedition which discovered the straits separating Asia and America.
                        Among the graduates of the School were A. Chirikov who explored the north-western edge of North
                        America, A. Nagaev, S. Malygin, D. Laptev, Admiral N. Senyavin, historian and public figure V.
                        Tatischev, architect I. Michurin, who invented with A. Nartov the wood processing machine, and
                        many others. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The School did not have a fixed term of study.
                        Some students managed to finish the programme in 4 years, while for some it took 13. There were
                        no end-of-the-year exams and students moved from class to class according to their personal
                        performance. The age of the students varied from 15 to 33. The students were stimulated by money
                        allowances. The most affluent or talented were sent to internships abroad. Upon their arrival
                        back home they were subjected to strict examination, sometimes by Peter the Great himself. As
                        early as 1715 the School had trained about 1200 specialists. Its graduates put up an honorable
                        performance in the sea battle of Gangut (1714) where the Russian fleet won its first victory,
                        and were part of the Bering expedition which discovered the straits separating Asia and America.
                        Among the graduates of the School were A. Chirikov who explored the north-western edge of North
                        America, A. Nagaev, S. Malygin, D. Laptev, Admiral N. Senyavin, historian and public figure V.
                        Tatischev, architect I. Michurin, who invented with A. Nartov the wood processing machine, and
                        many others. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Materials collected by the School graduates were
                        used to make the first atlas of the Russian Empire in 1745. In 1715 a part of the
                        higherprogramme students and faculty was transferred to Saint Petersburg to become a nucleus of
                        the Maritime Academy founded by Peter the Great. Students of the higher classes took practical
                        training in the fleet and were publicly known as the Sea Guards. Upon completion of the training
                        programme the students were awarded the rank of officers. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The School for Mathematical and Navigational
                        Crafts was liquidated in 1752. Its higher classes were joined with the Maritime Academy which
                        was transformed into Gentry Sea Corps that existed in Saint Petersburg up to 1917. Its graduates
                        contributed many brilliant lines into the history of the Russian Fleet. Among them are
                        outstanding scholars – engineers A. Krylov, I. Bubnov and many others. After the October
                        Revolution the M. Frunze Higher Naval School, still functioning today was founded on its basis
                        and in the same building. Soon following the Navigational School, Artillery and Engineering
                        School, and later, in 1703, Moscow Engineering School for 100–150 students were founded.
                        Sometimes students from this latter school were directed to the School for Mathematical and
                        Navigational Crafts for instruction in arithmetic and geometry. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In 1713 Petersburg Engineering School was
                        organized which in 1723 was combined with the Moscow school. Creation of these schools was the
                        beginning of an all-Russian network of institutions for general education of the first and
                        second levels. The significance of the School for Mathematical and Navigational Crafts for the
                        history of engineering education in Russia is great. It has educated not only naval specialists
                        but also civil engineers, mechanics, architects, as well as specialists of many other
                        professions. It has a full right to be regarded as the first higher technical education
                        institution in Russia, and the date of its foundation – January 14 (or January 24th by new
                        style), 1701 – as the starting date of technical education in Russia. </p>
                    {{--                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>--}}
                    {{--                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>--}}
                    {{--                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>--}}
                </div>
            </div>
        </section>
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 1 C
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Russia’s Top Universities
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russia’s top universities have very competitive
                        entry requirements, and special entry exams are held each year. Students must apply for studies
                        according to the standard competitive system. Higher education is provided by public and
                        non-public (non-State) accredited higher education institutions. The academic year lasts from
                        September 1 to the middle of June everywhere, with long summer vacations from July 1st to August
                        31. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Most of Russia’s universities are located in
                        large cities. Moscow State University, which was founded in 1755 and has about 28,000 students
                        and 8,000 teachers, enjoys the highest reputation. The Russian People’s Friendship University in
                        Moscow has about 6,500 students and 1,500 teachers, and St. Petersburg State University has
                        about 21,000 students and 2,100 teachers</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Many Russian universities also offer distance
                        education and provide courses for specific professional needs. However, such systems are usually
                        less developed than in the US and other Western European countries. </p>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 1 D
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Moscow State University
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lomonosov Moscow State University is the oldest
                        and the most prestigious university of Russia. Moscow University was founded in 1755 on Saint
                        Tatiana’s Day at the decree of the Empress Elizaveta and on the initiative of the great Russian
                        scientist Mikhail Lomonosov. The day of Moscow University’s foundation is celebrated as the
                        Student’s Day in Russia. Started with three faculties in 1755, Moscow State University nowadays
                        offers education in 27 faculties and research training in a number of institutes. Moscow State
                        University has a long-standing tradition of academic excellence. At this oldest and most famous
                        Russian university, scientific and educational schools of international reputation have been
                        formed. A number of its graduates and professors had become Nobel Prize winners and are
                        considered world famous scientists. According to all private and governmental surveys, Lomonosov
                        Moscow State University is the leading national educational establishment. It is internationally
                        recognized and ranked among the top ten in the world. The University has been providing a means
                        for the people from all over the world to learn about the latest advances in sciences,
                        humanities and medicine for about 250 years</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The total number of university students including
                        post-graduates exceeds 30,000. The university employs 8,500 professors, teachers and
                        researchers. About 6,900 of them hold Doctor of Science Degrees. The number of foreign students
                        is growing constantly. Currently the university hosts about 3,000 students from about 100
                        countries. The university teachers and professors are highly qualified and world recognized for
                        their achievements in modern sciences. Further, the application of the latest techniques in
                        teaching provides the necessary background for an excellent education. The Diploma of Moscow
                        University has won universal prestige and is recognized worldwide. Many educational programmes
                        are carried out in close co-operation with research institutes of the university and the Russian
                        Academy of Sciences. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The main building of the university is world
                        famous for its exceptional architecture and size – it is the largest and highest university
                        building throughout the world. The university campus located in one of the most beautiful parts
                        of Moscow supplies the students with all necessary facilities: lecture halls, laboratories,
                        libraries, dining halls, dormitories, movie theatre, conference hall, post office, clinics,
                        pharmacy, and various shops. The university campus includes 12 training halls, 2 swimming pools,
                        baseball and football stadiums, tennis courts and other sport facilities. The university closely
                        cooperates with the leading international organizations including UNESCO and The World
                        Bank. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The University is a member of various
                        international associations and has concluded more than 350 exchange, research and cooperation
                        agreements with universities on all continents. Moscow State University is also the centre of
                        cooperation between the universities of the former USSR. The Rector, Prof. V.A. Sadovnichy, is
                        the President of the Eurasian Association of Universities. Many outstanding scholars, public and
                        state leaders of the world have been elected Honourary Professors and Doctors of the University.
                        Among them are J. Goethe, the beloved German thinker and novellist, the first prime-minister of
                        India Jawaharlal Nehru, Margarete Thatcher, Bill Clinton. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Moscow State University provides a wide range of
                        educational services and educational programmes. It has established modern educational
                        programmes in all basic areas of research and education. The educational system of the
                        University is designed to give a student deep understanding of fundamental disciplines combined
                        with specialization in the applied and concrete scientific problems. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Almost all programmes at the University are
                        delivered in the Russian language. However, some graduate and training programmes are conducted
                        in foreign languages. Courses of different type and duration, pre-university programmes, various
                        specialized courses including teachers’ and researchers’ qualification advancement studies as
                        well as courses of the Russian language, history and culture are open for international
                        students. </p>
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 2 A
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Higher Education in Great Britain
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Higher education in Great Britain is provided by
                        three main types of institutions: universities, colleges and institutions of higher education,
                        and art and music colleges. All universities are autonomous institutions, particularly in
                        matters relating to courses. They are empowered by a Royal Charter or an Act of Parliament. As a
                        result of the Further and Higher Education Act of 1992, the binary line separating universities
                        and polytechnics was abolished and polytechnics were given university status (i.e., the right to
                        award their own degrees) and took university titles. The Council for National Academic Awards
                        was abolished, leaving most institutions to confer their own degrees. Most universities are
                        divided into faculties which may be subdivided into departments. Universities in the UK examine
                        matters of concern to all universities. Many colleges and institutions of higher education are
                        the result of mergers of teacher training colleges and other colleges. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non-university higher education institutions also
                        provide degree courses, various non-degree courses and postgraduate qualifications. Some may
                        offer Higher Degrees and other qualifications offered by most nonuniversity higher education
                        institutions which are validated by external bodies such as a local university or the Open
                        University. An institution can also apply for the authority to award its own degrees but it must
                        be able to demonstrate a good record of running degree courses validated by other universities.
                        A degree from any one British university or institution of higher education is considered to be
                        academically equivalent to a degree from any other British university or institution of higher
                        education. However, certain British universities carry, for historical reasons, extra prestige.
                        Oxford and Cambridge are obvious examples, and competition for entry to these universities is
                        great. Some British degrees are one-subject in style, e.g. BSc in Chemistry, but many
                        dual-subject degrees and, increasingly, special combinations such as sciences or business
                        administration with a modern language are offered. An increasing number of degrees involving
                        study in Britain and another EU country are now available. </p>
                    {{--                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>--}}
                    {{--                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>--}}
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 2 B
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Entrance Procedures
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A bachelor’s degree (BA, BSc, etc.) can be
                        obtained by a minimum of three year’s study at one of the more than 200 universities or
                        institutions of higher education in the UK offering degree courses. Some degree courses last
                        four years, the extra year being spent in practical training, as in many ‘sandwich’ degrees such
                        as engineering, or as a year abroad if studying a modern language.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Only about the top 7% of the age cohort in the UK
                        studies for a degree; consequently entry to universities or similar institutions is highly
                        competitive. Typical entry requirements would be at least 3 C grades at A Level for university
                        courses and perhaps three D grades for entry to other institutions of higher education. In the
                        third term of Year 12 students prepare their applications to university. Applications are then
                        made in the first term of the Year 13 through one centralized organization known as UCAS*. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The applications are made on a UCAS form,
                        electronically through
                        the EAS*. Students can apply to a maximum of six
                        universities/institutions. As well as the student’s personal details and a
                        paragraph on their extra-curricular interests, the UCAS form will carry
                        details of their (I)GCSE grades so far and an academic/character reference
                        from the school which will include a prediction of the grades that the
                        applicant is likely to obtain at A Level. It is therefore vital that students
                        impress upon their teachers the quality of their work throughout the entire
                        sixth form course and that they do not think of Year 12 as an ‘easy’ year</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If a university or institution is impressed by
                        the student’s UCAS
                        form, they will send an offer of a place conditional upon obtaining certain
                        stated A Level grades. Applicants are allowed to provisionally accept and
                        hold a maximum of two offers. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The final decision on which institution the
                        student will actually
                        attend will be taken when the A Level results are published in mid-August.
                        Degree courses start in late September or early October.
                    </p>
                    <p>*UCAS – Universities and Colleges Admissions Service</p>
                    <p>*EAS – Electronic Applications Systems. </p>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 2 C
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Higher Education in the USA
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Education in the United States is provided mainly
                        by the
                        government, with control and funding coming from all three levels:
                        federal, state, and local. Curricula, funding, teaching, and other policies are
                        set through locally elected boards with jurisdiction over university districts.
                        University districts can be coextensive with counties or municipalities.
                        Educational standards and standardized testing decisions are usually made
                        by the U.S. states through acts of the state legislature and governor, and
                        decisions of the state departments of education.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In the United States, students begin higher
                        education after
                        completing 12 years of primary and secondary school. Institutions of
                        higher education include two-year colleges (known as community or junior
                        colleges), four-year colleges, universities, institutes of technology,
                        vocational and technical schools, and professional schools such as law and
                        medical schools. Higher education is available in public (government
                        support) and private (no government support) institutions, institutions
                        affiliated with religious groups, and profit-making institutions. Some
                        excellent colleges enroll fewer than a thousand students; some large
                        universities enroll 50,000 or more students. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generally, at the high school level, the students
                        take a broad variety
                        of classes without special emphasis. The curriculum varies widely in
                        quality and rigidity; for example, some states consider 70 (on a 100 point
                        scale) to be a passing grade while others consider it to be 75 and others 60.
                        The following are the typical minimum course sequences that one must
                        take in order to obtain a high school diploma; they are not indicative of the
                        necessary minimum courses or course rigor required for attending college
                        in the United States: 1. Science (biology, chemistry, and physics); 2.
                        Mathematics; 3. English (four years); 4. Social Science (various history,
                        government, and economics courses, always including American history);
                        5. Physical education (at least one year).
                    </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;High schools offer a wide variety of elective
                        courses, although the
                        availability of such courses depends upon each particular school’s financial
                        situation. Common types of electives include: 1. Visual arts (drawing, sculpture, painting,
                        photography); 2. Performing Arts (drama, band,
                        orchestra, dance); 3. Shop (woodworking, metalworking, automobile
                        repair); 4. Computers (word processing, programming, graphic design); 5.
                        Athletics; 6. Publishing (journalism, yearbook); 7. Foreign Languages
                        (French, German, and Spanish are common; Chinese, Latin, Greek and
                        Japanese are less common). </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Many students in high schools participate in
                        extracurricular
                        activities. These activities can extend to large amounts of time outside the
                        normal school day; home schooled students, however, are not normally
                        allowed to participate. Student participation in sports programmes, drill
                        teams, bands, and spirit groups can amount to hours of practices and
                        performances. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Most states have organizations which develop
                        rules for competition
                        between groups. These organizations are usually forced to implement time
                        limits on hours practised as a prerequisite for participation. </p>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 2 D
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Post-Secondary Education in the United States
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Post-secondary education in the United States is
                        known as college or
                        university and commonly consists of four years of study at an institution of
                        higher learning. Students traditionally apply to receive admission into
                        college, with varying difficulties of entrance. Schools differ in their
                        competitiveness and reputation; generally, public schools are viewed as
                        more lenient and less prestigious than the more expensive private schools.
                        Admissions criteria involve test scores (like the SAT and ACT) and class
                        ranking as well as extracurricular activities performed prior to the
                        application date. Also, many colleges consider the rigor of previous courses taken along with
                        the grades earned. Certain test scores, class rank,
                        or other numerical factors hardly ever have absolute, required levels, but
                        often have a threshold below which admission is unlikely.
                    </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Once admitted, students engage in undergraduate
                        study, which consists
                        of satisfying university and class requirements to achieve a bachelor’s degree.
                        The most common method consists of four years of study leading to a
                        Bachelor of Arts (BA), a Bachelor of Science (BS) degree, or sometimes (but
                        very rarely) another bachelor’s degree such as Bachelor of Fine Arts (BFA).
                        Some students choose to attend a “community college” for two years prior to
                        further study at another college or university. A community college is run by
                        the local municipality, usually the county. Though rarely handing out actual
                        degrees, community colleges may award an Associate of Arts (AA) degree
                        after two years. Those seeking to continue their education may transfer to a
                        four-year college or university. Some community colleges have automatic
                        enrollment agreements with a local four-year college, where the community
                        college provides the first two years of study and the university provides the
                        remaining years of study, sometimes all on one campus. The community
                        college awards the associate’s degree and the university awards the
                        bachelor’s and master’s degrees.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Graduate study, conducted after obtaining an
                        initial degree and
                        sometimes after several years of professional work, leads to a more
                        advanced degree such as a Master’s Degree (MA), Master of Science (MS),
                        or other less common master’s degrees such as Master of Business
                        Admisitration (MBA), Master of Education (MEd), and Master of Fine Arts
                        (MFA). After additional years of study and sometimes in conjunction with
                        the completion of a master’s degree, students may earn a Doctor of
                        Philosophy (Ph.D.) or other doctoral degree, such as Doctor of Arts, Doctor
                        of Education or Doctor of Theology. Some programmes, such as medicine,
                        have formal apprenticeship procedures like residency and interning which
                        must be completed after graduation and before one is considered to be fully
                        trained. Other professional programmes like law and business have no
                        formal apprenticeship requirements after graduation (although law school
                        graduates must take the bar exam in order to legally practice law). Entrance
                        into graduate programmes usually depends upon a student’s undergraduate
                        academic performance or professional experience as well as their score on a
                        standardized entrance exam like the GRE (graduate schools in general), the
                        LSAT (law), the GMAT (business), or the MCAT (medicine). Many graduate
                        and law schools do not require experience after earning a bachelor’s degree to
                        enter their programmes; however, business school candidates may be
                        considered deficient without several years of professional work experience.
                        Only 8.9% of students ever receive postgraduate degrees and most, after
                        obtaining their bachelor’s degree, proceed directly into the work force.</p>
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 3 A
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Higher Education in Russia
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The history of Russia is a long and complex
                        story. It all begins with that of the East Slavs, the
                        racial group that eventually split into the
                        Russians, Ukrainians, and Belarussians. The first
                        East Slavic state, Kievan Rus, adopted
                        Christianity from the Byzantine Empire in the
                        10th century, beginning the synthesis of
                        Byzantine and Slavic cultures that defined
                        Russian culture for the next seven centuries.
                        Kievan Rus ultimately collapsed as a state, leaving a number of states
                        challenging for claims to be the heirs to its civilization and dominant
                        position. After the 13th century, Muscovy gradually came to rule the
                        former cultural center. In the 18th century, the principality of Muscovy
                        became the huge Russian Empire, stretching from Poland eastward to the
                        Pacific Ocean. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Development in the western direction sharpened
                        Russia’s alertness of
                        its backwardness and devastated the isolation in which the initial stages of
                        development had occurred. Consecutive establishments of the 19th century
                        reacted to such pressures with a mixture of halfhearted improvement and
                        domination. Russian serfdom was abolished in 1861, but its elimination
                        was achieved on terms unfavorable to the peasants and served to increase
                        revolutionary pressures. Between the elimination of serfdom and beginning
                        of World War I in 1914, the Stolypin reforms, the constitution of 1906 and
                        State Duma introduced notable changes in economy and politics of Russia,
                        but the tsars were still not willing to yield autocratic rule. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Military defeat and food shortages triggered the
                        Russian Revolution
                        in 1917, bringing the Communist Bolsheviks to power. Between 1922 and
                        1991, the history of Russia is essentially the history of the Soviet Union,
                        efficiently and ideologically based territory which was roughly
                        coterminous with the Russian Empire, whose last monarch, Tsar Nicholas
                        II, ruled until 1917. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From its first years, regime in the Soviet Union
                        was based on the
                        one-party rule of the communists, as the Bolsheviks called themselves
                        beginning in March 1918. However, by the late 1980s, with the
                        weaknesses of its economic and political structures becoming prominent,
                        noteworthy changes in the economy and the party leaderships spelled the
                        end of the Soviet Union. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The history of the Russian Federation is brief,
                        dating back only to the
                        collapse of the Soviet Union in late 1991. But Russia has existed as a state
                        for over a thousand years, and during most of the 20th century Russia was
                        the core of the Soviet Union. Since gaining its independence, Russia
                        claimed to be the legal heir to the Soviet Union on the international stage.
                        However, Russia lost its superpower status as it faced serious challenges in
                        its efforts to forge a new post-Soviet political and economic system.
                        Scrapping the socialist central planning and state ownership of property of
                        the Soviet era, Russia attempted to build an economy with elements of
                        market capitalism, with often painful results. Russia today shares much
                        continuity of political culture and social structure with its tsarist and Soviet
                        past.
                    </p>
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 3 B
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Geography of Russia
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The modern Russian state is geographically
                        isolated. It is enclosed,
                        except in the West, by landlocked seas, deserts and mountains. The most
                        impressive thing about the country is its tremendous size. It is the largest
                        self-contained state in the world. It has the characteristics of a continent
                        rather than a country with its nearly nine million square miles, covering
                        almost a sixth of the earth surface. Some 230 million people live here,
                        divided into 170 different nationalities. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There are 38,000 miles of land frontier, nine
                        times that of the
                        United States, bringing many different neighbors close to Russia. Starting
                        in the Northwest there are the Finns, Poles, Czech, Hungarians,
                        Rumanians, Turks, Iranians, Afghanistanis, Chinese, Mongolians and
                        Koreans.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If we include narrow straits, then the Japanese
                        and Americans are
                        also Russia’s neighbors. Russia is larger than all of North America, three
                        times the size of the continental US, forty times the size of France and
                        seventy times larger than the British Isles. It stretches halfway across the
                        globe.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Except at the Polish border, mountains and seas
                        guard the Russian
                        segment of the plain. Inside this perimeter the monotony of the plain is
                        broken only slightly by the Ural Mountains, a chain of low worn-down
                        hills that do not prevent movement across. Most of the rivers in European
                        Russia flow south, their western banks have steep hills. But these hills are
                        nowhere more than 1000 feet high and therefore do not present a barrier.
                        These geographic facts have made for easy movement of the population
                        in this great basin, but they have also made the area extremely difficult to
                        defend in time of war. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Russian coastline is the longest in the world
                        but it has limited
                        utility since the coastal waters are frozen much of the year. No nation has
                        been as bountifully supplied with rivers as Russia. They may provide a
                        leisurely system of transportation but it is expensive, using boats and
                        barges in the summer and skies and seas in the winter. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Four fifths of Russia lies in the temperate zone
                        but much further
                        north than any other great power. Russia’s climate is continental,
                        distinguished by extremes of heat and cold. Temperatures are generally
                        lower and winters longer in Russia than in other places on the same
                        latitudes because of the distance from the Atlantic and because the
                        Scandinavian mountains deflect the warm air of the Gulf Stream. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The growing season is short in Russia: only two
                        months of the year
                        are free of frost in Northern Siberia, about 100 days in the northern half
                        of European Russia and between four and six months in South Russia.
                        The Russian farmer has to work hard to beat the autumn frost. There is
                        little work outside in low temperatures because of the icy winds, and the
                        few hours of daylight.
                    </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In a country where the climate varies from
                        subtropical to arctic,
                        there is a great variety of vegetation. Nearly 15% of Russia is tundra most
                        of which is uninhabitable. Farther south you will find heather,
                        blackberries, cranberries and a profusion of wild flowers. All few stunted
                        birches, fir and willow grow in the southern tundra. Below the tundra is
                        the taiga covered with spruce, pine, cedar and fir. These forests stretch
                        from Arkhangelsk to the Sea of Okhotsk. Much of the taiga is marshy.
                        South of the taiga is the zone of mixed forests, where coniferous and
                        deciduous trees appear interspersed – oak, fir, elm, maple, ash, linden,
                        lime, birch and hornbeam. Much of this forest has been cleared west of
                        the Urals and is low under cultivation. Flax and rye are the staple crops
                        here. A huge territory of two forest zones covers over half of all Russia.
                    </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russia is one of the most richly endowed nations
                        in the world in
                        mineral wealth. But only recently has much of this been exploited or even
                        discovered. Siberia is still a largely untapped reservoir of potential
                        mineral riches. One fifth of the world’s known coal deposits lies inside
                        Russia which ranks second only to the US in the size of its reserves.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Over half of the world’s oil reserves lies within
                        the borders of the
                        Soviet Union. There are also immense deposits of iron, copper, nickel,
                        bauxite, zinc, lead, manganese, platinum, tin, mercury, antimony, radium,
                        molybdenum, graphite, boron and other elements indispensable to modern
                        industry. </p>
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 3 C
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Modern Russia’s Economy and Industries
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russia has a complete range of mining and
                        extractive industries
                        producing coal, oil, gas, chemicals, and metals; all forms of machine
                        building from rolling mills to high-performance aircraft and space
                        vehicles; defense industries including radar, missile production, and
                        advanced electronic components, shipbuilding; road and rail transportation
                        equipment; communications equipment; agricultural machinery, tractors,
                        and construction equipment; electric power generating and transmitting
                        equipment; medical and scientific instruments; consumer durables, textiles,
                        foodstuffs, handicrafts. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russia ended 2004 with its sixth straight year of
                        growth, averaging
                        6.5 per cent annually since the financial crisis of 1998. Although high oil
                        prices and a relatively cheap rouble are important drivers of this economic
                        rebound, since 2000 investment and consumer-driven demand have played
                        a noticeably increasing role. Real fixed capital investments have averaged
                        gains greater than 10 per cent over the last five years, and real personal
                        incomes have realized average increases over 12 per cent. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russia has also improved its international
                        financial position since the
                        1998 financial crisis, having paid off its foreign debt by 2007. Strong oil
                        export earnings have allowed Russia to increase its foreign reserves from
                        only $12 billion to some $120 billion at yearend 2004. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;These achievements, along with a renewed
                        government effort to
                        advance structural reforms, have raised business and investor confidence in
                        Russia’s economic prospects. Nevertheless, serious problems persist.
                        Economic growth slowed down in the second half of 2004 and the Russian
                        government forecast growth of only 4.5 per cent to 6.2 per cent for 2005.
                        Oil, natural gas, metals, and timber account for more than 80 per cent of
                        exports, leaving the country vulnerable to swings in world prices. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russia’s manufacturing base is dilapidated and
                        must be replaced or
                        modernized if the country is to achieve broad-based economic growth.
                        Other problems include a weak banking system, a poor business climate
                        that discourages both domestic and foreign investors, corruption, and
                        widespread lack of trust in institutions. </p>
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 3 D
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Moscow
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Moscow is the capital of Russia, its
                        administrative, economic,
                        political and educational centre. It is located on the river Moskva in the
                        western region of Russia. It is one of Russia’s major cities with the
                        population of over 9 million people. Its total area is about 900 thousand
                        square kilometers. Moscow is a unique city, its architecture combines the
                        features of both Oriental and Western cultures. Today we are the witnesses
                        of a new stage in Moscow’s life. Here, more than anywhere else, one can
                        feel the atmosphere of all those changes which draw the attention of the
                        whole world</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The city was founded by Prince Yuri Dolgorukiy
                        and was first
                        mentioned in the chronicles in 1147. At that time it was a small frontier
                        settlement. By the 15th century Moscow had grown into a wealthy city. In
                        the 16th century, under Ivan the Terrible, Moscow became the capital of
                        the state of Muscovy. In the 18th century Peter the Great transferred the
                        capital to St. Petersburg, but Moscow remained the heart of Russia. That is why it became the
                        main target of Napoleon’s attack in 1812. During the
                        war of 1812 three quarters of the city were destroyed by fire, but by the
                        middle of the 19th century Moscow was completely rebuilt. The presentday Moscow is the seat of
                        the government of the Russian Federation.
                        President of Russia lives and works here; government offices are located
                        here, too. Moscow is a major industrial city. Its leading industries are
                        engineering, chemical and light industries.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Russian contrasts are more present in Moscow than
                        in any other city
                        in Russia. Ancient monasteries and ultra-modern monoliths stand side by
                        side and the new Russian millionaires and the poor pensioners walk side by
                        side in the same streets. Moscow’s streets are lined with small monolithic
                        department stores and beautiful churches that are being restored after the
                        vandalism of the Soviet era and the hardline atheism. Every visitor to
                        Moscow is irresistibly drawn to the Red Square,
                        the historical and spiritual heart of the city, so
                        loaded with associations and drama that it seems
                        to embody all of Russia’s triumphs and
                        tragedies. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Kremlin broads and glitters in the
                        heart of Moscow. It thrills and tantalizes
                        whenever you see its towers against the skyline
                        or its cathedrals and palaces arrayed above the
                        Moskva River. The Kremlin is surrounded by a
                        beautiful residential district that is known as the
                        White Town. The White Town was the very
                        heart of the city during the sixteenth century, and
                        even today it has a strongly medieval feel. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Moscow is also well known as the site of the
                        Saint Basil’s Cathedral,
                        with its elegant onion domes. The
                        Patriarch of Moscow, whose residence is
                        the Danilov Monastery, serves as the head
                        of the Russian Orthodox Church. Moscow
                        is also known for many other historical
                        buildings, museums and art galleries, as
                        well as for the famous Bolshoi, Maly and
                        Art theatres. There are more than 80
                        museums in Moscow, among them the
                        unique Pushkin Museum of Fine Arts and
                        the State Tretyakov Gallery, the Andrey Rublyov – Museum of Early
                        Russian Art and many others.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Moscow is a city of science and learning. There
                        are over 80 higher
                        educational institutions in the city, including a number of universities. </p>
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 4 A
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    The United States of America
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The story of the American people is a
                        story of immigration and diversity. The
                        first Europeans to reach North America
                        were Icelandic Vikings, about the year
                        1000. Traces of their visit have been found
                        in the Canadian province of
                        Newfoundland, but the Vikings failed to
                        establish a permanent settlement and soon
                        lost contact with the new continent. Five
                        centuries later, the demand for Asian
                        spices, textiles, and dyes spurred European
                        navigators to dream of shorter routes
                        between East and West. Acting on behalf of the Spanish crown, in 1492
                        the Italian navigator Christopher Columbus sailed west from Europe and
                        landed on one of the Bahama Islands in the Caribbean Sea. Within 40 years, Spanish adventurers
                        carved out a huge empire in Central and South
                        America. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The USA came into existence on July 4th, 1776,
                        when thirteen
                        English colonies decided that they could no longer regard themselves as
                        subjects to the British Crown. In 1783 the War of Independence ended in
                        favour of the colonists. Since that time the United States has welcomed
                        more immigrants than any other country – more than 50 million in all –
                        and still admits almost 700,000 persons a year. In the past many American
                        writers emphasized the idea of the melting pot, an image that suggested
                        newcomers would discard their old
                        customs and adopt American ways.
                        Typically, for example, the children of
                        immigrants learned English but not their
                        parents’ first language. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The United States is the fourthlargest country in
                        the world, with an
                        area of over 9 million square
                        kilometers. It is bordered on the north
                        by Canada and on the south by Mexico.
                        Alaska and the Hawaiian Islands are
                        both states of the Union, but because of
                        their geographical detachment from the
                        United States, they are described under
                        separate headings. Different parts of the
                        USA experience extremes of heat and
                        cold characteristic of hot tropical
                        deserts or cold Arctic continental regions. Another feature of the weather
                        and climate of the United States is the variation of weather over quite short
                        periods at all seasons of the year.
                    </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The USA is a federal republic.
                        The President, elected for 4 years, is
                        head of the state and government. The
                        legislative power belongs to the
                        Congress which consists of the House
                        of Representatives and the Senate.
                        Elections to the Congress are every
                        two years, when the whole House of
                        Representatives and 1/3 of the total
                        number of senators are replaced.
                        There are two major political parties
                        in the US, the Democratic and the
                        Republican. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The USA is a highly developed industrial country.
                        There are coalmines in the Cordillera Mountains, in the Kansas City region. The heavy
                        industry is in the region of the Great Lakes, around Detroit and Chicago.
                        Ship-building is developed along the Atlantic coast and in San Francisco
                        on the Pacific coast. Agriculture of the USA is wide-spread and highly
                        mechanized. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The capital of the USA is Washington. The other
                        big and important
                        cities are New York, Boston, Chicago, Detroit, Los Angeles, etc.
                    </p>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 4 B
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Washington and New York
                </h1>
            </div>

            <div class="w-full flex items-center text-base md:text-lg font-semibold ">
                <div>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Washington is the capital of the United States.
                        The city was founded
                        in 1790 on a site chosen by George Washington, the first President of the
                        USA. Washington is not the largest city in the USA, it has the population
                        about one million people. In the political sense, however, it is the most
                        important city in the US. Washington is one of the world’s most beautiful
                        capitals, not only the centre of the National Government, but also it has
                        become a great cultural, educational and scientific centre. It has many
                        famous monuments: the Library of the Congress of the USA, the Abraham
                        Lincoln Memorial, the Tomb of the Unknown Soldier, the Washington
                        Monument.</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New York is the most populous city in the United
                        States, the most
                        densely populated major city in North America, as well as the centre of
                        international finance, politics, entertainment, and culture. New York City
                        is home to an almost unrivaled collection of world-class museums,
                        galleries, performance venues,
                        media outlets, international
                        corporations, and stock
                        exchanges. The city is also
                        home to all of the missions to
                        the United Nations, which has
                        its headquarters in New York
                        City. New York is widely
                        regarded as one of the great
                        intellectual, financial, and
                        cultural centers of the world. New York has an area of 309 square miles
                        (800 km²). Estimated in 2004 to have more than 8,168,388 residents, it is
                        the heart of the New York Metropolitan Area, which is one of the largest
                        urban conglomerations in the world with a population of over 22 million.
                        New York City proper comprises five boroughs: Brooklyn, the Bronx,
                        Manhattan, Queens, and Staten Island. </p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The city includes large populations of immigrants
                        from over 180
                        countries who help make it one of the most cosmopolitan places on earth.
                        Many people from all over the United States are also attracted to New
                        York City for its culture, energy, and cosmopolitism, and by their own
                        hope of making it big in the “Big Apple”. The city serves as an enormous
                        engine for the global economy, and is home to more than 500 companies.</p>
                </div>
            </div>
        </section>


        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200 w-full"
                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"
        >
            <div class="text-center pb-6">
                <h2 class="text-base font-bold text-indigo-300">
                    Text 4 C
                </h2>
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    British Parliament
                </h1>
            </div>
            <div class="text-center pb-6 w-full">
                <h1 class="font-bold text-xl lg:text-2xl font-heading ">
                    Скоро...
                </h1>
            </div>
        </section>


        {{--        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12 text-gray-200"--}}
        {{--                 :class="{'text-gray-200': theme == 1, 'text-gray-800': theme == 2, 'text-gray-300': theme == 3 }"--}}
        {{--        >--}}
        {{--            <div class="text-center pb-6">--}}
        {{--                <h2 class="text-base font-bold text-indigo-300">--}}
        {{--                    Text 1 A--}}
        {{--                </h2>--}}
        {{--                <h1 class="font-bold text-xl lg:text-2xl font-heading ">--}}
        {{--                    Higher Education in Russia--}}
        {{--                </h1>--}}
        {{--            </div>--}}

        {{--            <div class="w-full flex items-center text-base md:text-lg font-semibold ">--}}
        {{--                <div>--}}
        {{--                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}


        {{--        <div class="text-center w-full">--}}
        {{--            <p class="text-white text-4xl pt-16 pb-16 ">Главный директор</p>--}}
        {{--        <div class="max-w-xs mx-auto px-16">--}}
        {{--            <div--}}
        {{--                class="max-w-xs  mx-auto bg-white border-2 pt-4 bg-indigo-900 bg-opacity-40 shadow-xl gap-5 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700">--}}
        {{--                <div class="pb-2 border-double border-b-2 border-light-blue-500">--}}

        {{--                     Блок с изображением--}}
        {{--                    <div class="mx-auto rounded-full border-0 h-32 w-32 overflow-hidden">--}}
        {{--                        <img--}}
        {{--                             src="https://cdn.discordapp.com/attachments/882642110153637919/887785148626661396/LogoEmpire2.png">--}}
        {{--                    </div>--}}
        {{--                    Блок с именем и должностью--}}
        {{--                    <span class="text-2xl text-gray-100">MinusD</span>--}}

        {{--                </div>--}}
        {{--                    <span class="text-xl text-gray-100">Founder</span>--}}
        {{--                    <p class="text-base text-gray-100 my-2">Back-end developer</p>--}}
        {{--                 </div>--}}
        {{--             </div>--}}

        {{--            Блок с участниками--}}
        {{--            <div class="relative pt-16 pb-8 text-center">--}}
        {{--                <span class="text-3xl text-gray-100">Участники</span>--}}
        {{--            </div>--}}



        {{--            <div class="max-w-xs mx-auto px-16">--}}
        {{--                <div--}}
        {{--                    class="max-w-xs  mx-auto bg-white border-2 pt-4 bg-indigo-900 bg-opacity-40 shadow-xl gap-5 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700">--}}
        {{--                    <div class="pb-2 border-double border-b-2 border-light-blue-500">--}}
        {{--                         Блок с изображением--}}
        {{--                        <div class="mx-auto rounded-full h-32 w-32 overflow-hidden">--}}
        {{--                            <img--}}
        {{--                                src="https://cdn.discordapp.com/attachments/765261897716334633/887996167265341450/vFMhT2iCkV0.jpg">--}}
        {{--                        </div>--}}
        {{--                        Блок с именем и должностью--}}
        {{--                        <span class="text-2xl text-gray-100">kkudlinkov</span>--}}
        {{--                    </div>--}}
        {{--                    <span class="text-xl text-gray-100">Moderator</span>--}}
        {{--                    <p class="text-base text-gray-100 my-2">Front-end developer</p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <a href="#footer"
           class="fixed z-10 p-3 bg-indigo-600 bg-opacity-40 rounded-full shadow-md bottom-5 right-5 md:bottom-10 md:right-10 rotate-180">
            <svg class="w-4 h-4 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </a>
    </div>

    <!-- Foooter -->
    <section class="" id="footer">
        <div class=" px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <div class="px-5 py-2">
                    <a href="{{ route('landing.home') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Главная
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="{{ route('landing.about') }}"
                       class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        О нас
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="{{ route('landing.contacts') }}"
                       class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Контакты
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="{{ route('guest.schedule') }}"
                       class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Раcписание
                    </a>
                </div>
            </nav>

            <div class="flex justify-center mt-8 space-x-6">
                <a href="https://vk.com/maybecompany" target="_blank" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Vk</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                         id="Capa_1" x="0px" y="0px" width="548.358px" height="548.358px" viewBox="0 0 548.358 548.358"
                         style="enable-background:new 0 0 548.358 548.358;" xml:space="preserve">
<g>
    <path
        d="M545.451,400.298c-0.664-1.431-1.283-2.618-1.858-3.569c-9.514-17.135-27.695-38.167-54.532-63.102l-0.567-0.571   l-0.284-0.28l-0.287-0.287h-0.288c-12.18-11.611-19.893-19.418-23.123-23.415c-5.91-7.614-7.234-15.321-4.004-23.13   c2.282-5.9,10.854-18.36,25.696-37.397c7.807-10.089,13.99-18.175,18.556-24.267c32.931-43.78,47.208-71.756,42.828-83.939   l-1.701-2.847c-1.143-1.714-4.093-3.282-8.846-4.712c-4.764-1.427-10.853-1.663-18.278-0.712l-82.224,0.568   c-1.332-0.472-3.234-0.428-5.712,0.144c-2.475,0.572-3.713,0.859-3.713,0.859l-1.431,0.715l-1.136,0.859   c-0.952,0.568-1.999,1.567-3.142,2.995c-1.137,1.423-2.088,3.093-2.848,4.996c-8.952,23.031-19.13,44.444-30.553,64.238   c-7.043,11.803-13.511,22.032-19.418,30.693c-5.899,8.658-10.848,15.037-14.842,19.126c-4,4.093-7.61,7.372-10.852,9.849   c-3.237,2.478-5.708,3.525-7.419,3.142c-1.715-0.383-3.33-0.763-4.859-1.143c-2.663-1.714-4.805-4.045-6.42-6.995   c-1.622-2.95-2.714-6.663-3.285-11.136c-0.568-4.476-0.904-8.326-1-11.563c-0.089-3.233-0.048-7.806,0.145-13.706   c0.198-5.903,0.287-9.897,0.287-11.991c0-7.234,0.141-15.085,0.424-23.555c0.288-8.47,0.521-15.181,0.716-20.125   c0.194-4.949,0.284-10.185,0.284-15.705s-0.336-9.849-1-12.991c-0.656-3.138-1.663-6.184-2.99-9.137   c-1.335-2.95-3.289-5.232-5.853-6.852c-2.569-1.618-5.763-2.902-9.564-3.856c-10.089-2.283-22.936-3.518-38.547-3.71   c-35.401-0.38-58.148,1.906-68.236,6.855c-3.997,2.091-7.614,4.948-10.848,8.562c-3.427,4.189-3.905,6.475-1.431,6.851   c11.422,1.711,19.508,5.804,24.267,12.275l1.715,3.429c1.334,2.474,2.666,6.854,3.999,13.134c1.331,6.28,2.19,13.227,2.568,20.837   c0.95,13.897,0.95,25.793,0,35.689c-0.953,9.9-1.853,17.607-2.712,23.127c-0.859,5.52-2.143,9.993-3.855,13.418   c-1.715,3.426-2.856,5.52-3.428,6.28c-0.571,0.76-1.047,1.239-1.425,1.427c-2.474,0.948-5.047,1.431-7.71,1.431   c-2.667,0-5.901-1.334-9.707-4c-3.805-2.666-7.754-6.328-11.847-10.992c-4.093-4.665-8.709-11.184-13.85-19.558   c-5.137-8.374-10.467-18.271-15.987-29.691l-4.567-8.282c-2.855-5.328-6.755-13.086-11.704-23.267   c-4.952-10.185-9.329-20.037-13.134-29.554c-1.521-3.997-3.806-7.04-6.851-9.134l-1.429-0.859c-0.95-0.76-2.475-1.567-4.567-2.427   c-2.095-0.859-4.281-1.475-6.567-1.854l-78.229,0.568c-7.994,0-13.418,1.811-16.274,5.428l-1.143,1.711   C0.288,140.146,0,141.668,0,143.763c0,2.094,0.571,4.664,1.714,7.707c11.42,26.84,23.839,52.725,37.257,77.659   c13.418,24.934,25.078,45.019,34.973,60.237c9.897,15.229,19.985,29.602,30.264,43.112c10.279,13.515,17.083,22.176,20.412,25.981   c3.333,3.812,5.951,6.662,7.854,8.565l7.139,6.851c4.568,4.569,11.276,10.041,20.127,16.416   c8.853,6.379,18.654,12.659,29.408,18.85c10.756,6.181,23.269,11.225,37.546,15.126c14.275,3.905,28.169,5.472,41.684,4.716h32.834   c6.659-0.575,11.704-2.669,15.133-6.283l1.136-1.431c0.764-1.136,1.479-2.901,2.139-5.276c0.668-2.379,1-5,1-7.851   c-0.195-8.183,0.428-15.558,1.852-22.124c1.423-6.564,3.045-11.513,4.859-14.846c1.813-3.33,3.859-6.14,6.136-8.418   c2.282-2.283,3.908-3.666,4.862-4.142c0.948-0.479,1.705-0.804,2.276-0.999c4.568-1.522,9.944-0.048,16.136,4.429   c6.187,4.473,11.99,9.996,17.418,16.56c5.425,6.57,11.943,13.941,19.555,22.124c7.617,8.186,14.277,14.271,19.985,18.274   l5.708,3.426c3.812,2.286,8.761,4.38,14.853,6.283c6.081,1.902,11.409,2.378,15.984,1.427l73.087-1.14   c7.229,0,12.854-1.197,16.844-3.572c3.998-2.379,6.373-5,7.139-7.851c0.764-2.854,0.805-6.092,0.145-9.712   C546.782,404.25,546.115,401.725,545.451,400.298z"/>
</g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
</svg>
                </a>
                <a href="https://www.instagram.com/maybe_company/" target="_blank"
                   class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="https://github.com/MinusD" target="_blank" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">GitHub</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="https://discord.gg/aJh8b6X" target="_blank" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Discord</span>
                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="71" height="55"
                         viewBox="0 0 71 55">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z"
                                fill="currentColor"/>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="71" height="55" fill="currentColor"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-400">
                © 2019-2021 MayBe Company. Все права защищены.
            </p>
        </div>
    </section>

</div>

