clc;
clear;
close all;                            
%% GREEDY ALGORITH: FIND THE BEST COST-EFFECTIVE SOLUTION FOR EACH SENARION

%% STEP 1: Fetch data from database which is in json format and creation of tables to help the process.

    % Get data from 5g_solutions json file 
    jsonText_5g_solutions = fileread("Inputs-json\5g_scenario.json");
    jsonData_5g_solutions = jsondecode(jsonText_5g_solutions); % Convert JSON formatted text to MATLAB data types
    Table_5g_solutions = table(jsonData_5g_solutions);

    % Get data from nb_solutions json file 
    jsonText_nb_solutions = fileread("Inputs-json\nb_scenario.json");
    jsonData_nb_solutions = jsondecode(jsonText_nb_solutions); % Convert JSON formatted text to MATLAB data types
    Table_nb_solutions = table(jsonData_nb_solutions);

    % Get data from lora_solutions json file 
    jsonText_lora_solutions = fileread("Inputs-json\lora_scenario.json");
    jsonData_lora_solutions = jsondecode(jsonText_lora_solutions); % Convert JSON formatted text to MATLAB data types
    Table_lora_solutions = table(jsonData_lora_solutions);

    % Get cost data from json file 
    jsonText_Cost = fileread("Inputs-json\cost.json");
    jsonData_Cost = jsondecode(jsonText_Cost); % Convert JSON formatted text to MATLAB data types
    jsonDataCostTable = table(jsonData_Cost);

%% STEP 2: Access the solution tables and Cost calculation

    % 5G Scenario
    for j=1:1:20
        cost_a = str2double(Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.cost_5g_type_a);
        installattion_Cost_a = str2double(Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_5g_type_a);  
        costA = (cost_a + installattion_Cost_a);

        cost_b = str2double(Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.cost_5g_type_b);
        installattion_Cost_b = str2double(Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_5g_type_b);  
        costB = (cost_b + installattion_Cost_b);

        cost_c = str2double(Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.cost_5g_type_c);
        installattion_Cost_c = str2double(Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_5g_type_c);  
        costC = (cost_c + installattion_Cost_c);

        solution_5g_FinalCost(j) = costA + costB + costC;
    end


    % LORA Scenario
    for j=1:1:20

        cost_a = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_a);
        installattion_Cost_a = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_a);  
        costA = (cost_a + installattion_Cost_a);

        cost_b = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_b);
        installattion_Cost_b = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_b);  
        costB = (cost_b + installattion_Cost_b);

        cost_c = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_c);
        installattion_Cost_c = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_c);  
        costC = (cost_c + installattion_Cost_c);

        cost_g = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraGatewayTypeA) * str2double(jsonDataCostTable.jsonData_Cost.cost_lora_gateway_type_a); 
        installattion_Cost_g = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraGatewayTypeA) * str2double(jsonDataCostTable.jsonData_Cost.installation_lora_gateway_type_a);  
        costG = (cost_g + installattion_Cost_g);

        solution_lora_FinalCost(j) = costA + costB + costC + costG;
    end
   
    % NB-IoT Scenario
    for j=1:1:20

        cost_a = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.cost_nb_type_a);
        installattion_Cost_a = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_a);  
        costA = (cost_a + installattion_Cost_a);

        cost_b = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.cost_nb_type_b);
        installattion_Cost_b = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_b);  
        costB = (cost_b + installattion_Cost_b);

        cost_c = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.cost_nb_type_c);
        installattion_Cost_c = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_c);  
        costC = (cost_c + installattion_Cost_c);

        solution_nb_FinalCost(j) = costA + costB + costC;
    end
    
%% Calling the algorithm 
    
% Each function's parameter is a table with the final cost for each scenario and for each solution 
find_the_cheapest(solution_5g_FinalCost, solution_lora_FinalCost, solution_nb_FinalCost); 

%% STEP 3: Start of Greedy Algorith - Finds the best solutions for each scenario
function find_the_cheapest(solution_5g_FinalCost, solution_lora_FinalCost, solution_nb_FinalCost)
    minimum_cost_5g = solution_5g_FinalCost(1);
    minimum_cost_lora = solution_lora_FinalCost(1);
    minimum_cost_nb = solution_nb_FinalCost(1);
    c1 = 0;
    c2 = 0;
    c3 = 0;
    for l=1:1:20
        if solution_5g_FinalCost(l) < minimum_cost_5g
            c1 = c1 + 1;
            minimum_cost_5g = solution_5g_FinalCost(l);
            cheapest_5g_solution = l;
            cheapest_5g_solutionTable(c1) = cheapest_5g_solution;
            cheapest_5g_solutionTableCost(c1) = minimum_cost_5g;
        elseif solution_5g_FinalCost(l) == minimum_cost_5g
            c1 = c1 + 1;
            minimum_cost_5g = solution_5g_FinalCost(l);
            cheapest_5g_solution = l;
            cheapest_5g_solutionTable(c1) = cheapest_5g_solution;
            cheapest_5g_solutionTableCost(c1) = minimum_cost_5g;
        end
        if solution_lora_FinalCost(l) < minimum_cost_lora
            c2 = c2 + 1;
            minimum_cost_lora = solution_lora_FinalCost(l);
            cheapest_lora_solution = l;
            cheapest_lora_solutionTable(c2) = cheapest_lora_solution;
            cheapest_lora_solutionTableCost(c2) = minimum_cost_lora;
        elseif solution_lora_FinalCost(l) == minimum_cost_lora
            c2 = c2 + 1;
            minimum_cost_lora = solution_lora_FinalCost(l);
            cheapest_lora_solution = l;
            cheapest_lora_solutionTable(c2) = cheapest_lora_solution;
            cheapest_lora_solutionTableCost(c2) = minimum_cost_lora;
        end
        if solution_nb_FinalCost(l) < minimum_cost_nb
            c3 = c3 + 1;
            minimum_cost_nb = solution_nb_FinalCost(l);
            cheapest_nb_solution = l;
            cheapest_nb_solutionTable(c3) = cheapest_nb_solution;
            cheapest_nb_solutionTableCost(c3) = minimum_cost_nb;
        elseif solution_nb_FinalCost(l) == minimum_cost_nb
            c3 = c3 + 1;
            minimum_cost_nb = solution_nb_FinalCost(l);
            cheapest_nb_solution = l;
            cheapest_nb_solutionTable(c3) = cheapest_nb_solution;
            cheapest_nb_solutionTableCost(c3 ) = minimum_cost_nb;
        end
    end 
    json_file_generator_greedy(cheapest_5g_solutionTable,cheapest_5g_solutionTableCost, ...
        cheapest_lora_solutionTable,cheapest_lora_solutionTableCost,cheapest_nb_solutionTable, ...
        cheapest_nb_solutionTableCost);
end         
    

%% - Start creating json files!
function json_file_generator_greedy(cheapest_5g_solutionTable,cheapest_5g_solutionTableCost, ...
    cheapest_lora_solutionTable,cheapest_lora_solutionTableCost,cheapest_nb_solutionTable, ...
    cheapest_nb_solutionTableCost)

    %cheapest_5g_solutionTable =  struct2table(cheapest_5g_solutionTable);
    solutions_5g = table(cheapest_5g_solutionTable);
    solution_5g_cost = table(cheapest_5g_solutionTableCost);
    cheapest_lora_solutionTable = table(cheapest_lora_solutionTable);
    cheapest_lora_solutionTableCost = table(cheapest_lora_solutionTableCost);
    cheapest_nb_solutionTable = table(cheapest_nb_solutionTable);
    cheapest_nb_solutionTableCost = table(cheapest_nb_solutionTableCost);

	% cost-effective (cheapest) 5g solution (sort-by-cost)
    
	jsonText = jsonencode(solution_5g_cost); % Convert to JSON text
	jsonText = strrep(jsonText, '[{', sprintf('{\r\t'));
    jsonText = strrep(jsonText, ':[', sprintf(':[\r\t\t'));
    jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
    jsonText = strrep(jsonText, '}]', sprintf('\r}'));
    jsonText = strrep(jsonText, ']', sprintf('\r\t]'));  	
	fid = fopen('cost-effective-5g-solutions_by_cost.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-5g-solutions_by_cost.json','E:\Development\Laravel\Master-Thesis_Tool\public\MatlabCodes\Results')
	
	% cost-effective (cheapest) 5g solution (sort-by-solution)
	jsonText = jsonencode(solutions_5g); % Convert to JSON text
	jsonText = strrep(jsonText, '[{', sprintf('{\r\t'));
    jsonText = strrep(jsonText, ':[', sprintf(':[\r\t\t'));
    jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
    jsonText = strrep(jsonText, '}]', sprintf('\r}'));
    jsonText = strrep(jsonText, ']', sprintf('\r\t]')); 	
	fid = fopen('cost-effective-5g-solutions_by_solution.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-5g-solutions_by_solution.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')
		
	% cost-effective (cheapest) LoRa solution (sort-by-cost)
	jsonText = jsonencode(cheapest_lora_solutionTableCost); % Convert to JSON text
	jsonText = strrep(jsonText, '[{', sprintf('{\r\t'));
    jsonText = strrep(jsonText, ':[', sprintf(':[\r\t\t'));
    jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
    jsonText = strrep(jsonText, '}]', sprintf('\r}'));
    jsonText = strrep(jsonText, ']', sprintf('\r\t]'));
    
  	
	fid = fopen('cost-effective-lora-solutions_by_cost.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-lora-solutions_by_cost.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')	
	
	% cost-effective (cheapest) LoRa solution (sort-by-solution)	
	jsonText = jsonencode(cheapest_lora_solutionTable); % Convert to JSON text
	jsonText = strrep(jsonText, '[{', sprintf('{\r\t'));
    jsonText = strrep(jsonText, ':[', sprintf(':[\r\t\t'));
    jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
    jsonText = strrep(jsonText, '}]', sprintf('\r}'));
    jsonText = strrep(jsonText, ']', sprintf('\r\t]'));
  	
	fid = fopen('cost-effective-lora-solutions_by_solution.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-lora-solutions_by_solution.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')	
	
	
	% cost-effective (cheapest) NB-IoT solution (sort-by-cost)
	jsonText = jsonencode(cheapest_nb_solutionTableCost); % Convert to JSON text
	jsonText = strrep(jsonText, '[{', sprintf('{\r\t'));
    jsonText = strrep(jsonText, ':[', sprintf(':[\r\t\t'));
    jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
    jsonText = strrep(jsonText, '}]', sprintf('\r}'));
    jsonText = strrep(jsonText, ']', sprintf('\r\t]'));
  	
	fid = fopen('cost-effective-nb-solutions_by_cost.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-nb-solutions_by_cost.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')
	
	
	% cost-effective (cheapest) NB-IoT solution (sort-by-solution)
	jsonText = jsonencode(cheapest_nb_solutionTable); % Convert to JSON text
	jsonText = strrep(jsonText, '[{', sprintf('{\r\t'));
    jsonText = strrep(jsonText, ':[', sprintf(':[\r\t\t'));
    jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
    jsonText = strrep(jsonText, '}]', sprintf('\r}'));
    jsonText = strrep(jsonText, ']', sprintf('\r\t]'));
    %jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
	% jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
	% jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
	%jsonText = strrep(jsonText, '}', sprintf('\r}'));
  	
	fid = fopen('cost-effective-nb-solutions_by_solution.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-nb-solutions_by_solution.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results');		

end


