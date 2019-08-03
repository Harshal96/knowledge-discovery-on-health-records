# knowledge-discovery-on-health-records

A predictive model using Tensorflow CNN achieving 96% prediction accuracy; allowing customized visualizations on a web platform with Cassandra backend.
(Cassandra code not included to not violate academic integrity)

In India, medical data is currently trapped in discontinuous, fragmented storage systems; it may not even be digitized. There is no centralized database for patient records. This will become a problem as smart technologies become more prevalent across sectors; thus a proper framework mechanism is needed to integrate the multivariate sources of medical data; store, process and allow remote access to it, allowing the creation of a platform for various healthcare providers and users.

The challenge for researchers is the existence of incomplete, inconsistent medical datasets. This is an information-based challenge, especially in a country like India, where patient records are still maintained primarily on paper, and only by larger hospitals, it is stored digitally. Artificial intelligence has been the cause of various disruptions across multiple sectors, and the same is true for healthcare. AI requires an extensive cache of data; a central EHR subsystem is the perfect pair for such a predictive subsystem.

This project began in 2014 when I joined Larsen & Toubro Infotech as a Project Trainee an NFC card-based system to access user’s health details, manage appointments, order prescriptions, automate health insurance; doctors and labs to upload reports as a way to digitize medical records. 
Over several hackathons and competitions (4 years), the requirements changed and we better understood the project receiving feedback from hundreds of mentors, we learned more about the various use-cases our project could be beneficial for and implemented them.

We consolidated, structured and preprocessed the data into one standardized platform.

A researcher or any other health-care provider would be able to access the system remotely; over the Internet to be given a dashboard allowing queries as per the access level authorized. The user can perform two basic functions: upload/synchronize/merge the data generated at his end, by existing EMR/EHR software, to be exported in common medical formats; these specifications have been standardized already.

Additional functions which can be performed include aggregative queries to research trends by physiological parameters, or even parameters such as location; for example to study the spread of a particular infectious disease; another function is to allow predictive queries, wherein common neural networks defined for a particular scenario can effectively predict the value of a particular physiological parameter based on the values/records provided.

Winner: TechnoFest 
Winner: Dipex 
Runner Up: Jugaadathon (the healthcare hackathon) 
Participant - Barclays Risehackathon 
and more...

Dataset:
Lung Resection (Thoracic Surgery) Dataset
1. Diagnosis - ICD code 
2. Forced vital capacity (lungs) 
3. Volume exhaled after forced expiration (in 1 second) 
4. Performance status - Zubrod scale (code) 
5. Pain before surgery - (T,F) 
6. Haemoptysis before surgery - (T,F) 
7. Dyspnoea before surgery - (T,F) 
8. Cough before surgery - (T,F) 
9. Weakness before surgery - (T,F) 
10. Size of the original tumour - code 
11. Type 2 DM - diabetes mellitus - (T,F) 
12. MI up to 6 months - (T,F) 
13. PAD (Peripheral Arterial Diseases. - (T,F) 
14. Smoking - (T,F) 
15. Asthma - (T,F) 
16. Age at surgery (numeric)

Pima Indians Diabetes Dataset
1. Number of times pregnant 
2. Plasma glucose concentration: 2 hours in an oral glucose tolerance test 
3. Diastolic blood pressure (mm Hg) 
4. Triceps skinfold thickness (mm) 
5. 2-Hour serum insulin (mu U/ml) 
6. Body mass index (weight in kg/(height in m)) 
7. Age (years)
