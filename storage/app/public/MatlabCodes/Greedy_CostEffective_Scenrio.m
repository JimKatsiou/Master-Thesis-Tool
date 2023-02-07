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
    jsonText_Cost = fileread("Inputs-json\costs.json");
    jsonData_Cost = jsondecode(jsonText_Cost); % Convert JSON formatted text to MATLAB data types
    jsonDataCostTable = table(jsonData_Cost);

%% STEP 2: Access the solution tables and Cost calculation

    % 5G Scenario
    for j=1:1:20

        numberOf5gSensorsTypeA = Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeA;
        cost_5g_type_a = jsonDataCostTable.jsonData_Cost.cost_5g_type_a;
        cost_a = numberOf5gSensorsTypeA * cost_5g_type_a;
        installation_cost_5g_type_a = jsonDataCostTable.jsonData_Cost(j,1).installation_cost_5g_type_a;
        costA = (cost_a + installation_cost_5g_type_a);

        numberOf5gSensorsTypeB = Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeB;
        cost_5g_type_b = jsonDataCostTable.jsonData_Cost.cost_5g_type_b;
        cost_b = numberOf5gSensorsTypeB * cost_5g_type_b;
        installation_cost_5g_type_b = jsonDataCostTable.jsonData_Cost(j,1).installation_cost_5g_type_b;
        costB = (cost_b + installation_cost_5g_type_b);

        numberOf5gSensorsTypeC = Table_5g_solutions.jsonData_5g_solutions(j,1).numberOf5gSensorsTypeC;
        cost_5g_type_c = jsonDataCostTable.jsonData_Cost.cost_5g_type_c;
        cost_c = numberOf5gSensorsTypeC * cost_5g_type_c;
        installation_cost_5g_type_c = jsonDataCostTable.jsonData_Cost(j,1).installation_cost_5g_type_c; 
        costC = (cost_c + installation_cost_5g_type_c);

        solution_5g_FinalCost(j) = costA + costB + costC;
    end


    % LORA Scenario
    for j=1:1:20

        numberOfLoraSensorsTypeA = Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeA;
        cost_lora_type_a = jsonDataCostTable.jsonData_Cost.cost_lora_type_a;
        cost_a = numberOfLoraSensorsTypeA * cost_lora_type_a;
        installation_cost_lora_type_a = jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_a;  
        costA = (cost_a + installation_cost_lora_type_a);

        numberOfLoraSensorsTypeB = Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeB;
        cost_lora_type_b = jsonDataCostTable.jsonData_Cost.cost_lora_type_b;
        cost_b = numberOfLoraSensorsTypeB * cost_lora_type_b;
        installation_cost_lora_type_b = jsonDataCostTable.jsonData_Cost(j,1).installation_cost_lora_type_b;  
        costB = (cost_b + installation_cost_lora_type_b);

        numberOfLoraSensorsTypeC = Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeC;
        cost_lora_type_c = jsonDataCostTable.jsonData_Cost.cost_lora_type_c;
        cost_c = numberOfLoraSensorsTypeC * cost_lora_type_c;
        installation_cost_lora_type_c = jsonDataCostTable.jsonData_Cost(j,1).installation_cost_lora_type_c;  
        costC = (cost_c + installation_cost_lora_type_c);

        numberOfGatewaysTypeA = Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfGatewaysTypeA;
        cost_lora_gateway_type_a = jsonDataCostTable.jsonData_Cost.cost_lora_gateway_type_a;
        cost_g_a = numberOfGatewaysTypeA * cost_lora_gateway_type_a;
        installation_lora_gateway_type_a = jsonDataCostTable.jsonData_Cost(j,1).installation_lora_gateway_type_a;  
        costGA = (cost_g_a + installation_lora_gateway_type_a);

        numberOfGatewaysTypeB = Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfGatewaysTypeB;
        cost_lora_gateway_type_b = jsonDataCostTable.jsonData_Cost.cost_lora_gateway_type_b;
        cost_g_b = numberOfGatewaysTypeB * cost_lora_gateway_type_b;
        installation_lora_gateway_type_b = jsonDataCostTable.jsonData_Cost(j,1).installation_lora_gateway_type_b;  
        costGB = (cost_g_b + installation_lora_gateway_type_b);

        solution_lora_FinalCost(j) = costA + costB + costC + costGA + costGB;
        % solution_lora_FinalCost(j) = costA + costB + costC;
    end
   
    % NB-IoT Scenario
    for j=1:1:20

        numberOfNBSensorsTypeA = Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeA;
        cost_nb_type_a = jsonDataCostTable.jsonData_Cost(j,1).cost_nb_type_a;
        cost_a = numberOfNBSensorsTypeA * cost_nb_type_a;
        installation_cost_nb_type_a = jsonDataCostTable.jsonData_Cost(j,1).installation_cost_nb_type_a;  
        costA = (cost_a + installation_cost_nb_type_a);

        numberOfNBSensorsTypeB = Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeB;
        cost_nb_type_b = jsonDataCostTable.jsonData_Cost(j,1).cost_nb_type_b;
        cost_b = numberOfNBSensorsTypeB * cost_nb_type_b;
        installation_cost_nb_type_b = jsonDataCostTable.jsonData_Cost(j,1).installation_cost_nb_type_b;  
        costB = (cost_b + installation_cost_nb_type_b);

        numberOfNBSensorsTypeC = Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeC;
        cost_nb_type_c = jsonDataCostTable.jsonData_Cost(j,1).cost_nb_type_c;
        cost_c = numberOfNBSensorsTypeC * cost_nb_type_c;
        installation_cost_nb_type_c = jsonDataCostTable.jsonData_Cost(j,1).installation_cost_nb_type_c;  
        costC = (cost_c + installation_cost_nb_type_c);

        solution_nb_FinalCost(j) = costA + costB + costC;
    end
    
%% Calling the algorithm 
    
% Each function's parameter is a table with the final cost for each scenario and for each solution 
find_the_cheapest(solution_5g_FinalCost, solution_lora_FinalCost, solution_nb_FinalCost, Table_5g_solutions, Table_nb_solutions, Table_lora_solutions); 

%% STEP 3: Start of Greedy Algorith - Finds the best solutions for each scenario
function find_the_cheapest(solution_5g_FinalCost, solution_lora_FinalCost, solution_nb_FinalCost, Table_5g_solutions, Table_nb_solutions, Table_lora_solutions)
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
        cheapest_lora_solutionTable,cheapest_lora_solutionTableCost,cheapest_nb_solutionTable,cheapest_nb_solutionTableCost, Table_5g_solutions, Table_nb_solutions, Table_lora_solutions);
end         
    

%% - Start creating json files!
function json_file_generator_greedy(cheapest_5g_solutionTable,cheapest_5g_solutionTableCost, ...
    cheapest_lora_solutionTable,cheapest_lora_solutionTableCost,cheapest_nb_solutionTable, ...
    cheapest_nb_solutionTableCost, Table_5g_solutions, Table_nb_solutions, Table_lora_solutions)

    cheapest_5g_solutionTable =  cheapest_5g_solutionTable;
    solutions_5g = table(cheapest_5g_solutionTable);
%     for l = 1:length(solutions_5g)
%         solution_number = solutions_5g(l);
%         solutions_5g_data(l) = Table_5g_solutions(l);
%     end

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
	
	movefile('cost-effective-5g-solutions_by_cost.json','Results\Greedy')
   	
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
	
	movefile('cost-effective-5g-solutions_by_solution.json','Results\Greedy')
		
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
	
	movefile('cost-effective-lora-solutions_by_cost.json','Results\Greedy')
  
	
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
	
	movefile('cost-effective-lora-solutions_by_solution.json','Results\Greedy')
	
	
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
	
	movefile('cost-effective-nb-solutions_by_cost.json','Results\Greedy')
	
	
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
	
	movefile('cost-effective-nb-solutions_by_solution.json','Results\Greedy')

    disp('Completed! all files was saved');

end
